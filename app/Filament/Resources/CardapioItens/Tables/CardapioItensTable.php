<?php

namespace App\Filament\Resources\CardapioItens\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CardapioItensTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('restaurante.nome')
                    ->label('Restaurante')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('categoria')
                    ->label('Categoria')
                    ->searchable(),
                TextColumn::make('preco_venda')
                    ->label('Preço')
                    ->money('BRL')
                    ->sortable(),
                TextColumn::make('tempo_preparo_minutos')
                    ->label('Tempo')
                    ->suffix(' min')
                    ->sortable(),
                IconColumn::make('ativo_online')
                    ->label('Online')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('restaurante_id')
                    ->label('Restaurante')
                    ->relationship('restaurante', 'nome'),
                SelectFilter::make('ativo_online')
                    ->label('Status Online')
                    ->options([
                        true => 'Ativo',
                        false => 'Inativo',
                    ]),
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




