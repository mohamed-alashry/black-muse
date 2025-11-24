<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Order;
use App\Models\BlockedDate;
use App\Models\Package;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Models\Question;
use App\Models\QuestionDependency;
use App\Models\Answer;

class ReservationService
{
    public function storeBooking()
    {
        $clientId = auth()->id();
        $cacheKey = 'reservation_' . $clientId;

        if (!Cache::has($cacheKey)) {
            return redirect()->route('site.home')->with('error', __('services.No reservation data found.'));
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

        // BlockedDate::create([
        //     'date'           => $booking->event_date,
        //     'blockable_type' => Package::class,
        //     'blockable_id'   => $booking->package_id,
        // ]);

        $this->saveRelatedData($reservationData, $booking, $cacheKey);

        return $booking;
    }

    public function storeOrder()
    {
        $clientId = auth()->id();
        $cacheKey = 'reservation_' . $clientId;

        if (!Cache::has($cacheKey)) {
            return redirect()->route('site.home')->with('error', __('services.No reservation data found.'));
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

        return $order;
    }

    protected function saveRelatedData(mixed $reservationData, mixed $reservation, string $cacheKey): void
    {
        $features = $reservationData['features'] ?? [];
        // foreach ($features as $feature) {
        //     ReservedFeatures::create([
        //         'feature_id'      => $feature['id'],
        //         'reservable_type' => get_class($reservation),
        //         'reservable_id'   => $reservation->id,
        //         'name'            => $feature['name'],
        //         'price'           => $feature['price'],
        //         'is_default'      => $feature['is_default'],
        //     ]);
        // }

        $optionTypes = ['select', 'radio', 'checkbox', 'color-select', 'image-select'];

        foreach ($reservationData['answers'] as $questionId => $answerValue) {
            if (is_null($answerValue)) {
                continue;
            }

            $question = Question::find($questionId);
            if (in_array($question->type, $optionTypes)) {
                $depndency_rel      = QuestionDependency::where('child_question_id', $questionId)->first();
                $question_option_id = $depndency_rel['question_option_id'] ?? null;
            }

            $answers = is_array($answerValue) ? $answerValue : [$answerValue];

            foreach ($answers as $answer) {
                $answer = $this->moveAnswerToStorage($answer);
                Answer::create([
                    'question_id'        => $questionId,
                    'value'              => $answer,
                    'answerable_type'    => get_class($reservation),
                    'answerable_id'      => $reservation->id,
                    'question_option_id' => $question_option_id ?? null,
                ]);
            }
        }

        // Cache::forget($cacheKey);
        session()->flash('success', __('services.Booking confirmed successfully.'));
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
}
