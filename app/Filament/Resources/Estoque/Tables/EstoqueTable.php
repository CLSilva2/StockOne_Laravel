<?php

namespace App\Filament\Resources\Estoque\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class EstoqueTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('insumo.nome')
                    ->label('Insumo')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('insumo.restaurante.nome')
                    ->label('Restaurante')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('quantidade_atual')
                    ->label('Quantidade Atual')
                    ->numeric(decimalPlaces: 3)
                    ->sortable(),
                TextColumn::make('insumo.unidade_medida')
                    ->label('Unidade')
                    ->badge(),
                TextColumn::make('localizacao')
                    ->label('Localização')
                    ->searchable(),
                TextColumn::make('insumo.ponto_reposicao_minimo')
                    ->label('Ponto de Reposição')
                    ->numeric(decimalPlaces: 2)
                    ->color(fn ($record) => $record->quantidade_atual <= $record->insumo->ponto_reposicao_minimo ? 'danger' : 'gray')
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Última Atualização')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('insumo.restaurante_id')
                    ->label('Restaurante')
                    ->relationship('insumo.restaurante', 'nome'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}




