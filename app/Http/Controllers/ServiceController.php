<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\File;
use App\Models\Service;
use App\Models\Package;
use App\Models\Feature;
use App\Models\Booking;
use App\Models\BlockedDate;
use App\Models\ReservedFeatures;
use App\Models\Answer;
use App\Models\Meeting;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class ServiceController extends Controller
{
    public function showAvailablePackages($id, Request $request)
    {
        $service = Service::with(['questions.options.childQuestions.options'])->findOrFail($id);

        if ($service->category === 'photography' && !$request->has('event_date')) {
            return redirect()->back()->with('error', "Please select a date first.");
        }

        $packages  = $service->packages()
            ->where('status', 'active')
            ->when($request->get('event_date'), function ($query, $date) {
                $query->whereDoesntHave('blockedDates', function (Builder $q) use ($date) {
                    $q->whereDate('date', $date);
                });
            })
            ->with(['features' => function ($query) {
                $query->where('status', 'active')
                    ->orderBy('featureables.is_default', 'desc');
            }])->get();
        $questions = $service->questions;

        return view('site.service.packages', compact('service', 'packages', 'questions'));
    }

    public function cacheReservation(Request $request)
    {
        $this->validateReservation($request);

        $answers = $this->handleAnswers($request);

        $allFeatures = $this->getAllFeatures($request);

        $this->cacheReservationData($request, $answers, $allFeatures);

        session()->flash('success', 'Reservation has been temporarily saved successfully.');

        return response()->json([
            'status'       => 'success',
            'redirect_url' => route('service.reservation.confirm'),
        ]);
    }

    public function confirmReservation()
    {
        $cacheKey = 'reservation_' . auth()->id();

        if (!Cache::has($cacheKey)) {
            return redirect()->route('site.home')->with('error', 'No reservation data found.');
        }

        $reservationData = Cache::get($cacheKey);

        return view('site.service.confirm_reservation', compact('reservationData'));
    }

    private function validateReservation(Request $request)
    {
        $rules      = [
            'event_date' => ['nullable', 'date'],
            'service_id' => ['required', 'integer'],
            'package_id' => ['required', 'integer'],
        ];
        $attributes = [];

        $service = Service::with('questions')->findOrFail($request->service_id);

        if ($service->category === 'photography') {
            $rules['event_date'] = ['required', 'date'];
        }

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

    private function cacheReservationData(Request $request, array $answers, array $allFeatures)
    {
        $service = Service::findOrFail($request->service_id);
        $package = Package::findOrFail($request->package_id);
        $prices  = $this->calculateTotalPrice($request);

        $dataToCache = [
            'event_date'       => $request->event_date ?? null,
            'service_id'       => $service->id,
            'service_name'     => $service->name,
            'service_category' => $service->category,
            'package_id'       => $package->id,
            'package_name'     => $package->name,
            'answers'          => $answers,
            'features'         => $allFeatures,
            'total_price'      => $prices['total_price'],
            'down_payment'     => $prices['down_payment'],
        ];

        $cacheKey = 'reservation_' . auth()->id();

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
        $cacheKey = 'reservation_' . $clientId;

        if (!Cache::has($cacheKey)) {
            return redirect()->route('packages.index')->with('error', 'No reservation data found.');
        }

        $reservationData = Cache::get($cacheKey);

        $booking                   = new Booking();
        $booking->client_id        = $clientId;
        $booking->service_id       = $reservationData['service_id'];
        $booking->package_id       = $reservationData['package_id'];
        $booking->event_date       = $reservationData['event_date'];
        $booking->paid_amount      = $reservationData['down_payment'];
        $booking->remaining_amount = $reservationData['total_price'] - $reservationData['down_payment'];
        $booking->total_price      = $reservationData['total_price'];
        $booking->notes            = $reservationData['notes'] ?? null;
        $booking->save();

        BlockedDate::create([
            'date'           => $booking->event_date,
            'blockable_type' => Package::class,
            'blockable_id'   => $booking->package_id,
        ]);

        $this->saveRelatedData($reservationData, $booking, $cacheKey);

        return redirect()->route('booking.meeting.confirm', $booking->id);
    }

    public function storeOrder()
    {
        $clientId = auth()->id();
        $cacheKey = 'reservation_' . $clientId;

        if (!Cache::has($cacheKey)) {
            return redirect()->route('packages.index')->with('error', 'No reservation data found.');
        }

        $reservationData = Cache::get($cacheKey);

        $order              = new Order();
        $order->client_id   = $clientId;
        $order->service_id  = $reservationData['service_id'];
        $order->package_id  = $reservationData['package_id'];
        $order->total_price = $reservationData['total_price'];
        $order->notes       = $reservationData['notes'] ?? null;
        $order->save();

        $this->saveRelatedData($reservationData, $order, $cacheKey);

        return redirect()->route('service.order.show', $order->id);
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
        $booking            = Booking::where('id', $id)->first();
        $meeting            = Meeting::where('booking_id', $id)->first();
        $confirmMeetingPage = Page::where('id', 6)->withActiveSections()->firstOrFail();

        if (!$meeting) {
         return view('site.service.confirm_meeting', compact('booking', 'meeting','confirmMeetingPage'));
        }
        return redirect()->route('site.home');
    }

    public function availableTimes(Request $request)
    {
        $date      = $request->input('date');
        $startTime = setting('meeting_start_time');
        $endTime   = setting('meeting_end_time');
        $duration  = setting('meeting_duration');  /// in minutes

        $start  = Carbon::createFromFormat('Y-m-d H:i', "$date $startTime");
        $end    = Carbon::createFromFormat('Y-m-d H:i', "$date $endTime");
        $period = CarbonPeriod::create($start, "{$duration} minutes", $end);

        $bookedMeetings = Meeting::whereDate('date', $date)->get();

        $bookedSlots = [];
        foreach ($bookedMeetings as $meeting) {
            $bookedSlots[] = Carbon::parse($meeting->start_at)->format('H:i');
        }

        $availableTimes = [];

        while ($start->copy()->addMinutes((int)$duration)->lte($end)) {
            $from = $start->format('h:i');
            $to   = $start->copy()->addMinutes((int)$duration)->format('h:i a');
            if (!in_array($from, $bookedSlots)) {
                $availableTimes[] = [
                    'from' => $from,
                    'to'   => $to,
                ];
            }

            $start->addMinutes((int)$duration);
        }

        return response()->json([
            'status' => 'success',
            'times'  => $availableTimes,
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'date'       => 'required|date',
            'booking_id' => 'required',
            'from'       => 'required',
            'to'         => 'required',
        ]);

        $link                = $this->generateJitsiMeetingLink($request->booking_id);
        $meeting             = new Meeting();
        $meeting->booking_id = $request->booking_id;
        $meeting->link       = $link;
        $meeting->date       = $request->date;
        $meeting->start_at   = str_replace([' ', 'am', 'pm'], '', $request->from);
        $meeting->end_at     = str_replace([' ', 'am', 'pm'], '', $request->to);
        $meeting->duration   = setting('meeting_duration');
        $meeting->save();

        return response()->json([
            'message'    => 'Meeting saved successfully.',
            'meeting_id' => $meeting->id,
        ]);
    }

    public function viewBooking($id)
    {
        $booking = Booking::with('package.features')->findOrFail($id);

        return view('site.service.view_booking', compact("booking"));
    }

    public function completeBooking($id)
    {
        $booking                   = Booking::findOrFail($id);
        $booking->payment_status   = 'full_payment';
        $booking->remaining_amount = 0;
        $booking->paid_amount      = $booking->total_price;
        $booking->save();
        session()->flash('success', 'Payment completed and booking confirmed.');
        return redirect()->back();
    }

    public function viewOrder($id)
    {
        $order = Order::with('package.features')->findOrFail($id);

        return view('site.service.view_order', compact("order"));
    }

    private function generateJitsiMeetingLink($booking_id)
    {
        $booking     = booking::findOrFail($booking_id);
        $domain      = 'https://meet.jit.si';
        $roomName    = $booking->reference_number;
        $meetingLink = $domain . '/' . $roomName;
        return $meetingLink;
    }

    /**
     * @param mixed $reservationData
     * @param mixed $reservation
     * @param string $cacheKey
     * @return void
     */
    protected function saveRelatedData(mixed $reservationData, mixed $reservation, string $cacheKey): void
    {
        $features = $reservationData['features'] ?? [];
        foreach ($features as $feature) {
            ReservedFeatures::create([
                'feature_id'      => $feature['id'],
                'reservable_type' => get_class($reservation),
                'reservable_id'   => $reservation->id,
                'name'            => $feature['name'],
                'price'           => $feature['price'],
                'is_default'      => $feature['is_default'],
            ]);
        }

        foreach ($reservationData['answers'] as $questionId => $answerValue) {
            if (is_null($answerValue)) {
                continue;
            }

            $answers = is_array($answerValue) ? $answerValue : [$answerValue];

            foreach ($answers as $answer) {
                $answer = $this->moveAnswerToStorage($answer);
                Answer::create([
                    'question_id'     => $questionId,
                    'value'           => $answer,
                    'answerable_type' => get_class($reservation),
                    'answerable_id'   => $reservation->id,
                ]);
            }
        }

        Cache::forget($cacheKey);
        session()->flash('success', 'Booking confirmed successfully.');
    }
}
