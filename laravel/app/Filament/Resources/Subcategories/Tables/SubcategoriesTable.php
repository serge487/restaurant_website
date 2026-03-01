<?php

namespace App\Filament\Resources\Subcategories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SubcategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.name')
                    ->sortable()
                    ->searchable()
                    ->label('Parent Category')
                    ->badge(),
                    
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
                    
                IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}