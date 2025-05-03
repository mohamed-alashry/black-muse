<?php

namespace App\Observers;

use App\Models\Booking;
use App\Models\User;
use App\Notifications\BookingCreated;
use App\Notifications\BookingFullyPaid;
use App\Notifications\BookingReceived;
use App\Notifications\BookingStatusChanged;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

class BookingObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the Booking "created" event.
     */
    public function created(Booking $booking): void
    {
        # Send Notification to Admin
        User::permission('update_booking')->get()->each(fn($admin) => $admin->notify(new BookingCreated($booking)));

        # Send Notification to Client
        $booking->client->notify(new BookingReceived($booking));
    }

    /**
     * Handle the Booking "updated" event.
     */
    public function updated(Booking $booking): void
    {
        if ($booking->isDirty('booking_status')) {
            $booking->client->notify(new BookingStatusChanged($booking));
        }

        if ($booking->isDirty('payment_status') && $booking->payment_status === 'full_payment') {
            User::permission('update_booking')->get()->each(fn($admin) => $admin->notify(new BookingFullyPaid($booking)));
        }
    }

    /**
     * Handle the Booking "deleted" event.
     */
    public function deleted(Booking $booking): void
    {
        //
    }

    /**
     * Handle the Booking "restored" event.
     */
    public function restored(Booking $booking): void
    {
        //
    }

    /**
     * Handle the Booking "force deleted" event.
     */
    public function forceDeleted(Booking $booking): void
    {
        //
    }
}
