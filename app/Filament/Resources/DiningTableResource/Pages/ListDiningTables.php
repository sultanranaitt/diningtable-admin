<?php

namespace App\Filament\Resources\DiningTableResource\Pages;

use App\Filament\Resources\DiningTableResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\DiningTableResource\Widgets\TableWidget;

class ListDiningTables extends ListRecords
{
    protected static string $resource = DiningTableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array {
        return [
            TableWidget::class,
        ];
    }
}
