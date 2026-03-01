<?php

namespace App\Filament\Resources\MenuItems\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MenuItemForm
{
    public static function configure(Schema $schema): Schema
    {
        // THE FIX: using ->components() instead of ->schema()
        return $schema
            ->components([
                Select::make('subcategory_id')
                    ->relationship('subcategory', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->label('Subcategory'),

                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull()
                    ->nullable(),

                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),

                FileUpload::make('image')
                    ->image()
                    ->directory('menu-items')
                    ->nullable(),

                Toggle::make('is_available')
                    ->default(true),
            ]);
    }
}