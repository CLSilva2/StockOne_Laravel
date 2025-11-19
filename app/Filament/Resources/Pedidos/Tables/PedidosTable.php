<?php

namespace App\Filament\Resources\Pedidos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PedidosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('numero_pedido_externo')
                    ->label('Número Externo')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('restaurante.nome')
                    ->label('Restaurante')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('plataforma_origem')
                    ->label('Plataforma')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'ifood' => 'info',
                        'uber_eats' => 'success',
                        'rappi' => 'warning',
                        'delivery_proprio' => 'primary',
                        'presencial' => 'gray',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),
                TextColumn::make('data_hora_pedido')
                    ->label('Data/Hora')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'recebido' => 'info',
                        'em_preparo' => 'warning',
                        'pronto' => 'success',
                        'entregue' => 'gray',
                        'cancelado' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('valor_total')
                    ->label('Valor Total')
                    ->money('BRL')
                    ->sortable(),
                TextColumn::make('tempo_preparo_estimado')
                    ->label('Tempo (min)')
                    ->suffix(' min')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('restaurante_id')
                    ->label('Restaurante')
                    ->relationship('restaurante', 'nome'),
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'recebido' => 'Recebido',
                        'em_preparo' => 'Em Preparo',
                        'pronto' => 'Pronto',
                        'entregue' => 'Entregue',
                        'cancelado' => 'Cancelado',
                    ]),
                SelectFilter::make('plataforma_origem')
                    ->label('Plataforma')
                    ->options([
                        'ifood' => 'iFood',
                        'uber_eats' => 'Uber Eats',
                        'rappi' => 'Rappi',
                        'delivery_proprio' => 'Delivery Próprio',
                        'presencial' => 'Presencial',
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




