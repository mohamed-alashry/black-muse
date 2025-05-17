<?php

namespace App\Console\Commands;

use App\Models\Booking;
use App\Notifications\UnpaidBookingReminder;
use Illuminate\Console\Command;

class SendUnpaidBookingReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:unpaid-bookings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder emails for unpaid bookings 2 days before the event date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $targetDate = now()->addDays(2)->startOfDay();

        $bookings = Booking::whereDate('event_date', $targetDate)
            ->where('payment_status', 'down_payment')
            ->with('client')
            ->get();

        foreach ($bookings as $booking) {
            $booking->client->notify(new UnpaidBookingReminder($booking));
        }

        $this->info("Queued " . count($bookings) . " unpaid booking reminders for date " . $targetDate);
    }
}
