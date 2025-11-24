<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;

class PaymentStatusBreakdown extends ChartWidget
{
    protected static ?string $heading = 'Payment & Booking Status Breakdown';

    protected function getData(): array
    {
        $data = Booking::selectRaw("CONCAT(payment_stage, ' - ', status) as booking_status, COUNT(*) as count")
            ->groupBy('booking_status')
            ->orderBy('count', 'desc')
            ->pluck('count', 'booking_status')
            ->toArray();

        return [
            'labels'   => array_keys($data),
            'datasets' => [
                [
                    'label'           => 'Bookings',
                    'data'            => array_values($data),
                    'backgroundColor' => getRandomColors(count($data)),
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
