<?php

namespace App\Observers;

use App\Models\Contact;
use App\Models\User;
use App\Notifications\ContactCreated;
use App\Notifications\ContactReceived;
use App\Notifications\ContactStatusChanged;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;
use Illuminate\Support\Facades\Notification;

class ContactObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the Contact "created" event.
     */
    public function created(Contact $contact): void
    {
        $admin = User::find(1);

        # Send Notification to Admin
        $admin->notify(new ContactCreated($contact));

        # Send Notification to Client
        Notification::route('mail', $contact->email)->notify(new ContactReceived($contact));
    }

    /**
     * Handle the Contact "updated" event.
     */
    public function updated(Contact $contact): void
    {
        if ($contact->isDirty('status')) {
            Notification::route('mail', $contact->email)->notify(new ContactStatusChanged($contact));
        }
    }

    /**
     * Handle the Contact "deleted" event.
     */
    public function deleted(Contact $contact): void
    {
        //
    }

    /**
     * Handle the Contact "restored" event.
     */
    public function restored(Contact $contact): void
    {
        //
    }

    /**
     * Handle the Contact "force deleted" event.
     */
    public function forceDeleted(Contact $contact): void
    {
        //
    }
}
