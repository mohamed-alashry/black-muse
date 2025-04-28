<?php

namespace App\Observers;

use App\Models\Booking;
use App\Models\User;
use App\Notifications\BookingCreatedNotification;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

class BookingObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the Booking "created" event.
     */
    public function created(Booking $booking): void
    {
        $admin = User::find(1);

        $admin->notify(new BookingCreatedNotification($booking));
    }

    /**
     * Handle the Booking "updated" event.
     */
    public function updated(Booking $booking): void
    {
        //
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
