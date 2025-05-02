<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected ?string     $heading = 'Analytics';
    protected static ?int $sort    = -10;

    protected function getStats(): array
    {
        return [
            Stat::make('Clients', Client::count())
                ->description('registered clients')
                ->descriptionIcon('heroicon-m-user-group')
//                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Bookings', Booking::count())
                ->description('reserved bookings')
                ->descriptionIcon('heroicon-m-calendar-days')
//                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('warning'),
            Stat::make('Orders', Order::count())
                ->description('reserved orders')
                ->descriptionIcon('heroicon-m-receipt-percent')
//                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('danger'),
            Stat::make('Contacts', Contact::where('status', 'new')->count())
                ->description('new inquiry')
                ->descriptionIcon('heroicon-m-envelope')
//                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('info'),
        ];
    }
}
