<?php

namespace App\Observers;

use App\Models\Booking;
use App\Models\User;
use App\Notifications\BookingCreated;
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
        $admin = User::find(1);

        # Send Notification to Admin
        $admin->notify(new BookingCreated($booking));

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
