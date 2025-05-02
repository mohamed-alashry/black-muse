<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;

class AverageBookingValue extends ChartWidget
{
    protected static ?string $heading = 'Average Booking Value';

    protected function getData(): array
    {
        $periods = [
            'Last 30 Days' => ['start' => now()->subDays(30), 'interval' => 'perDay'],
            'Last 90 Days' => ['start' => now()->subDays(90), 'interval' => 'perDay'],
            'Last Year'    => ['start' => now()->subYear(),     'interval' => 'perMonth'],
        ];

        $labels = [];
        $datasets = [];

        foreach ($periods as $label => $config) {
            $builder = Trend::model(Booking::class)
                ->between($config['start'], now())
                ->{$config['interval']}();

            $trend = $builder->average('total_price');

            if (empty($labels)) {
                $labels = $trend->map(fn($point) => Carbon::parse($point->date)
                    ->format($config['interval'] === 'perMonth' ? 'Y-m' : 'Y-m-d')
                )->toArray();
            }

            $datasets[] = [
                'label' => $label,
                'data'  => $trend->map(fn($point) => $point->aggregate)->toArray(),
            ];
        }
//        dd($datasets);

        return [
            'labels'   => $labels,
            'datasets' => $datasets,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
