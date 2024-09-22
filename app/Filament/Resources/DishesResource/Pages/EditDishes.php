<?php

namespace App\Filament\Resources\DishesResource\Pages;

use App\Filament\Resources\DishesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDishes extends EditRecord
{
    protected static string $resource = DishesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
