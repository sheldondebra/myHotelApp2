<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '10s';


    protected function getStats(): array
    {
        return [
            Stat::make('Unique views', '192.1k')
             ->description('32k increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Bounce rate', '21%')
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Average time on page', '3:12')
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                 ->color('success'),
        ];
    }
}
