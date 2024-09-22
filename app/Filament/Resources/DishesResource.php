<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DishesResource\Pages;
use App\Filament\Resources\DishesResource\RelationManagers;
use App\Models\Dishes;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\BulkActionGroup; 
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DishesResource\Widgets\DishesWidget;

class DishesResource extends Resource
{
    protected static ?string $model = Dishes::class;

    protected static ?int $navigationSort = 3;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        return Dishes::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('meal')->required(),
                TextInput::make('comment')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('meal'),
                TextColumn::make('comment'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getWidgets(): array {
        return [
            DishesWidget::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDishes::route('/'),
            'create' => Pages\CreateDishes::route('/create'),
            'edit' => Pages\EditDishes::route('/{record}/edit'),
        ];
    }
}
