<?php

namespace App\Filament\Resources\Subcategories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SubcategoryForm
{
    public static function configure(Schema $schema): Schema
    {
         
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->label('Parent Category'),
                    
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Lower numbers appear first.'),
                    
                Toggle::make('is_active')
                    ->default(true),
            ]);
    }
}