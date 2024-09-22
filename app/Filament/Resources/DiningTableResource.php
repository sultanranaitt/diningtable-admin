<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DiningTableResource\Pages;
use App\Filament\Resources\DiningTableResource\RelationManagers;
use App\Filament\Resources\DiningTableResource\Widgets\TableWidget;
use App\Models\DiningTable;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Section;

class DiningTableResource extends Resource
{
    protected static ?string $model = DiningTable::class;

    protected static ?string $navigationIcon = 'heroicon-o-bolt';

    protected static ?string $modelLabel = 'Table';
    
    protected static ?int $navigationSort = 1;

    public static function getGloballySearchableAttributes(): array {
        return ['name'];
    }

    public static function getNavigationBadge(): ?string
    {
        return DiningTable::count();
    }

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Add table')
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('number')->integer()->unique(),
            ])->columnSpan(2),

            // Section::make('Add User and Dishes')
            // ->schema([
            //     Select::make('seat.dishes')
            //     ->relationship('seat.dishes', 'meal'),
            //     Select::make('seat.users')
            //     ->relationship('seat.users', 'email')
            // ])
            // ->columnSpan(1),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->sortable()
                ->searchable()
                ->toggleable(),
                TextColumn::make('seat.dishes.meal')
                ->label('Meal')
                ->sortable()
                ->searchable()
                ->toggleable(),
                TextColumn::make('seat.dishes.comment')
                ->label('Comment')
                ->sortable()
                ->searchable()
                ->toggleable(),
                TextColumn::make('seat.users.email')
                ->label('Email')
                ->sortable()
                ->searchable()
                ->toggleable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            TableWidget::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDiningTables::route('/'),
            'create' => Pages\CreateDiningTable::route('/create'),
            'edit' => Pages\EditDiningTable::route('/{record}/edit'),
        ];
    }
}
