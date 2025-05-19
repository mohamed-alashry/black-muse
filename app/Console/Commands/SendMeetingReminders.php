<?php

namespace App\Console\Commands;

use App\Models\Meeting;
use App\Models\User;
use App\Notifications\MeetingReminder;
use Illuminate\Console\Command;

class SendMeetingReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:meetings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send meeting reminders 1 hour before start';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $startWindow = now()->addHour()->startOfMinute();
        $endWindow   = (clone $startWindow)->endOfMinute();

        $meetings = Meeting::with(['booking.client', 'booking.service', 'booking.package', 'user'])
            ->where('status', 'pending')
            ->whereDate('date', now()->toDateString())
            ->whereBetween('start_at', [$startWindow, $endWindow])
            ->get();

        if ($meetings->isEmpty()) {
            $this->fail('No meetings to remind in the next hour.');
        }

        // fallback group: all admins with `update_booking` permission
        $fallbackAdmins = User::permission('update_booking')->get();

        foreach ($meetings as $meeting) {
            $client = $meeting->booking->client;
            $admin  = $meeting->user;  // relation or null

            // determine recipients & “other party” fields
            $adminRecipients = $admin
                ? collect([$admin])
                : $fallbackAdmins;

            // 1) Notify the client (other party = admin or “our team”)
            $otherName  = $admin?->name  ?? 'our admin team';
            $otherEmail = $admin?->email ?? config('mail.from.address');
            $client->notify(new MeetingReminder($meeting, $otherName, $otherEmail));

            // 2) Notify admin recipients (other party = client)
            foreach ($adminRecipients as $adm) {
                $adm->notify(new MeetingReminder(
                    $meeting,
                    $client->name,
                    $client->email
                ));
            }
        }

        $this->info("Dispatched reminders for {$meetings->count()} meeting(s).");
    }
}
