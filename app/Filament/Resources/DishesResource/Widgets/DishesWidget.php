<?php

namespace App\Filament\Resources\DishesResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Dishes;

class DishesWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Meals', Dishes::count()),
        ];
    }
}
