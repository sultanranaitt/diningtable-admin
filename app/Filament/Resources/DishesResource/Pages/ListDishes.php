<?php

namespace App\Filament\Resources\DishesResource\Pages;

use App\Filament\Resources\DishesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\DishesResource\Widgets\DishesWidget;

class ListDishes extends ListRecords
{
    protected static string $resource = DishesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array {
        return [
            DishesWidget::class,
        ];
    }
}
