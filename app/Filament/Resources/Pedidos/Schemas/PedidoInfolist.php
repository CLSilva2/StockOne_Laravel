<?php

namespace App\Filament\Resources\Pedidos\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PedidoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informações do Pedido')
                    ->schema([
                        TextEntry::make('numero_pedido_externo')
                            ->label('Número Externo'),
                        TextEntry::make('restaurante.nome')
                            ->label('Restaurante'),
                        TextEntry::make('plataforma_origem')
                            ->label('Plataforma')
                            ->badge(),
                        TextEntry::make('status')
                            ->label('Status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'recebido' => 'info',
                                'em_preparo' => 'warning',
                                'pronto' => 'success',
                                'entregue' => 'gray',
                                'cancelado' => 'danger',
                                default => 'gray',
                            }),
                    ])
                    ->columns(2),
                Section::make('Valores e Tempos')
                    ->schema([
                        TextEntry::make('valor_total')
                            ->label('Valor Total')
                            ->money('BRL'),
                        TextEntry::make('tempo_preparo_estimado')
                            ->label('Tempo Estimado')
                            ->suffix(' minutos'),
                        TextEntry::make('data_hora_pedido')
                            ->label('Data/Hora do Pedido')
                            ->dateTime(),
                    ])
                    ->columns(3),
                Section::make('Datas')
                    ->schema([
                        TextEntry::make('created_at')
                            ->label('Criado em')
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->label('Atualizado em')
                            ->dateTime(),
                    ])
                    ->columns(2),
            ]);
    }
}

