<?php

namespace App\Filament\Resources\DiningTableResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\DiningTable;

class TableWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Seats', DiningTable::count()),
            Stat::make('Occupied', DiningTable::has('seat.users')->count())
        ];
    }
}
