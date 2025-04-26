<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Http\File;
use App\Models\Service;
use App\Models\Package;
use App\Models\Feature;
use App\Models\Booking;
use App\Models\BlockedDate;
use App\Models\ReservedFeatures;
use App\Models\Answer;

class ServiceController extends Controller
{
    public function showAvailablePackages($id, Request $request)
    {
        if ($request->has('booking_date')) {
            $date          = $request->booking_date;
            $formattedDate = Carbon::parse($date)->format('d-m-Y');
            $service       = Service::with(['questions.options'])->findOrFail($id);
            $packages      = $service->packages()
                ->where('status', 'active')
                ->whereDoesntHave('blockedDates', function (Builder $query) use ($date) {
                    $query->whereDate('date', $date);
                })
                ->with(['features' => function ($query) {
                    $query->where('status', 'active')
                        ->orderBy('featureables.is_default', 'desc');
                }])->get();
            $questions     = $service->questions;

            return view('site.service.packages', compact('formattedDate', 'service', 'packages', 'questions'));

        } else {
            return redirect()->back()->with('error', "Please select a date first.");
        }

    }

    public function cacheBooking(Request $request)
    {
        $this->validateBooking($request);

        $answers = $this->handleAnswers($request);

        $allFeatures = $this->getAllFeatures($request);

        $this->cacheBookingData($request, $answers, $allFeatures);

        session()->flash('success', 'Booking has been temporarily saved successfully.');

        return response()->json([
            'status'       => 'success',
            'redirect_url' => route('service.booking.confirm'),
        ]);
    }

    public function confirmBooking()
    {
        $cacheKey = 'booking_' . auth()->id();

        if (!Cache::has($cacheKey)) {
            return redirect()->route('site.home')->with('error', 'No booking data found.');
        }

        $bookingData = Cache::get($cacheKey);

        return view('site.service.confirm_booking', compact('bookingData'));
    }

    private function validateBooking(Request $request)
    {
        $rules      = [
            'booking_date' => ['required', 'date'],
            'service_id'   => ['required', 'integer'],
            'package_id'   => ['required', 'integer'],
        ];
        $attributes = [];

        $service = Service::with('questions')->findOrFail($request->service_id);

        foreach ($service->questions as $question) {
            if ($question->pivot->is_required) {
                $questionKey              = "answers.{$question->id}";
                $rules[$questionKey]      = ['required'];
                $attributes[$questionKey] = "{$question->text} Question";
            }
        }

        $validator = Validator::make($request->all(), $rules, [], $attributes);

        if ($validator->fails()) {
            abort(response()->json(['errors' => $validator->errors()], 422));
        }
    }

    private function handleAnswers(Request $request)
    {
        $answers = $request->input('answers', []);

        foreach ($request->file('answers', []) as $questionId => $file) {
            if ($file) {
                if (is_array($file)) {
                    $paths = [];
                    foreach ($file as $singleFile) {
                        $paths[] = $singleFile->store('/', 'public');
                    }
                    $answers[$questionId] = $paths;
                } else {
                    $answers[$questionId] = $file->store('/', 'public');
                }
            }
        }

        return $answers;
    }

    private function getAllFeatures(Request $request)
    {
        $package = Package::with(['features' => function ($query) {
            $query->wherePivot('is_default', 1);
        }])->findOrFail($request->package_id);

        $defaultFeatures = $package->features->map(function ($feature) {
            $name = json_decode($feature->getRawOriginal('name'), true);
            return [
                'id'         => $feature->id,
                'name'       => json_encode($name, JSON_UNESCAPED_UNICODE),
                'price'      => $feature->price,
                'is_default' => 1
            ];
        })->toArray();

        $requestFeatures = Feature::whereIn('id', $request->features ?? [])->get()->map(function ($feature) {
            $name = json_decode($feature->getRawOriginal('name'), true);
            return [
                'id'         => $feature->id,
                'name'       => json_encode($name, JSON_UNESCAPED_UNICODE),
                'price'      => $feature->price,
                'is_default' => 0
            ];
        })->toArray();

        return array_merge($defaultFeatures, $requestFeatures);
    }

    private function cacheBookingData(Request $request, array $answers, array $allFeatures)
    {
        $service = Service::findOrFail($request->service_id);
        $package = Package::findOrFail($request->package_id);
        $prices  = $this->calculateTotalPrice($request);

        $dataToCache = [
            'booking_date' => $request->booking_date,
            'service_id'   => $service->id,
            'service_name' => $service->name,
            'package_id'   => $package->id,
            'package_name' => $package->name,
            'answers'      => $answers,
            'features'     => $allFeatures,
            'total_price'  => $prices['total_price'],
            'down_payment' => $prices['down_payment'],
        ];

        $cacheKey = 'booking_' . auth()->id();

        Cache::forget($cacheKey);

        Cache::put($cacheKey, $dataToCache, now()->addHour());
    }

    private function calculateTotalPrice(Request $request)
    {
        $package   = Package::findOrFail($request->package_id);
        $basePrice = $package->base_price;

        $selectedFeatures = Feature::whereIn('id', $request->features ?? [])->get();

        $featuresTotalPrice = $selectedFeatures->sum('price');

        $totalPrice = $basePrice + $featuresTotalPrice;

        $downPaymentAmount = $totalPrice * 0.5;

        return [
            'total_price'  => $totalPrice,
            'down_payment' => $downPaymentAmount,
        ];
    }

    public function storeBooking()
    {
        $clientId = auth()->id();
        $cacheKey = 'booking_' . $clientId;

        if (!Cache::has($cacheKey)) {
            return redirect()->route('packages.index')->with('error', 'No booking data found.');
        }

        $bookingData = Cache::get($cacheKey);


        $booking                   = new Booking();
        $booking->client_id        = $clientId;
        $booking->service_id       = $bookingData['service_id'];
        $booking->package_id       = $bookingData['package_id'];
        $booking->event_date       = $bookingData['booking_date'];
        $booking->paid_amount      = $bookingData['down_payment'];
        $booking->remaining_amount = $bookingData['total_price'] - $bookingData['down_payment'];
        $booking->total_price      = $bookingData['total_price'];
        $booking->notes            = $bookingData['notes'] ?? null;
        $booking->save();

        BlockedDate::create([
            'date'           => $booking->event_date,
            'blockable_type' => Package::class,
            'blockable_id'   => $booking->package_id,
        ]);

        $features = $bookingData['features'] ?? [];
        foreach ($features as $feature) {
            ReservedFeatures::create([
                'feature_id'      => $feature['id'],
                'reservable_type' => Booking::class,
                'reservable_id'   => $booking->id,
                'name'            => $feature['name'],
                'price'           => $feature['price'],
                'is_default'      => $feature['is_default'],
            ]);
        }

        foreach ($bookingData['answers'] as $questionId => $answerValue) {
            if (is_null($answerValue)) {
                continue;
            }

            $answers = is_array($answerValue) ? $answerValue : [$answerValue];

            foreach ($answers as $answer) {
                $answer = $this->moveAnswerToStorage($answer);
                Answer::create([
                    'question_id'     => $questionId,
                    'value'           => $answer,
                    'answerable_type' => Booking::class,
                    'answerable_id'   => $booking->id,
                ]);
            }
        }

        Cache::forget($cacheKey);
        session()->flash('success', 'Booking confirmed successfully.');
        return redirect()->route('service.meeting.confirm', $booking->id);
    }

    protected function moveAnswerToStorage($answer)
    {
        if (is_string($answer) && file_exists(public_path('storage/' . $answer))) {
            $file = new File(public_path('storage/' . $answer));

            $newPath = Storage::disk('public')->putFile('booking-files', $file);

            return $newPath;
        }

        return $answer;
    }

    public function confirmMeeting($id)
    {
        return view('site.service.confirm_meeting');
    }
}
