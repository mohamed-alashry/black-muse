<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;

class TopSellingPackages extends ChartWidget
{
    protected static ?string $heading = 'Top-Selling Packages';

    protected function getData(): array
    {
        // Get booking counts per package
        $bookingData = Booking::select('package_id', \DB::raw('COUNT(*) as count'))
            ->groupBy('package_id')
            ->with('package')
            ->get()
            ->mapWithKeys(fn($b) => [$b->package->name => $b->count])
            ->toArray();

        // Get order counts per package
        $orderData = \App\Models\Order::select('package_id', \DB::raw('COUNT(*) as count'))
            ->groupBy('package_id')
            ->with('package')
            ->get()
            ->mapWithKeys(fn($o) => [$o->package->name => $o->count])
            ->toArray();

        // Get unique package names (union of both arrays)
        $allLabels = array_unique(array_merge(array_keys($bookingData), array_keys($orderData)));

        // Prepare datasets
        $bookings = [];
        $orders = [];

        foreach ($allLabels as $label) {
            $bookings[] = $bookingData[$label] ?? 0;
            $orders[] = $orderData[$label] ?? 0;
        }

        return [
            'labels' => $allLabels,
            'datasets' => [
                [
                    'label' => 'Bookings',
                    'data' => $bookings,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235)',
                ],
                [
                    'label' => 'Orders',
                    'data' => $orders,
                    'backgroundColor' => 'rgba(153, 102, 255, 0.2)',
                    'borderColor' => 'rgba(153, 102, 255)',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
