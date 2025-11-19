<?php

namespace App\Filament\Resources\Pedidos\Schemas;

use App\Models\Restaurante;
use App\Models\User;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Schema;

class PedidoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Card::make()
                    ->schema([
                        Select::make('restaurante_id')
                            ->label('Restaurante')
                            ->required()
                            ->relationship('restaurante', 'nome')
                            ->searchable()
                            ->preload(),

                        Select::make('usuario_id')
                            ->label('Usuário')
                            ->relationship('usuario', 'name')
                            ->searchable()
                            ->preload(),

                        TextInput::make('numero_pedido_externo')
                            ->label('Número do Pedido Externo')
                            ->maxLength(255)
                            ->placeholder('ID do pedido na plataforma externa'),

                        Select::make('plataforma_origem')
                            ->label('Plataforma de Origem')
                            ->options([
                                'ifood' => 'iFood',
                                'uber_eats' => 'Uber Eats',
                                'rappi' => 'Rappi',
                                'delivery_proprio' => 'Delivery Próprio',
                                'presencial' => 'Presencial',
                            ])
                            ->required()
                            ->searchable(),

                        DateTimePicker::make('data_hora_pedido')
                            ->label('Data e Hora do Pedido')
                            ->required()
                            ->default(now())
                            ->displayFormat('d/m/Y H:i'),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'recebido' => 'Recebido',
                                'em_preparo' => 'Em Preparo',
                                'pronto' => 'Pronto',
                                'entregue' => 'Entregue',
                                'cancelado' => 'Cancelado',
                            ])
                            ->default('recebido')
                            ->required(),

                        TextInput::make('valor_total')
                            ->label('Valor Total (R$)')
                            ->numeric()
                            ->prefix('R$')
                            ->minValue(0),

                        TextInput::make('tempo_preparo_estimado')
                            ->label('Tempo de Preparo Estimado (minutos)')
                            ->numeric()
                            ->suffix('min')
                            ->minValue(0),
                    ])
                    ->columns(2),
            ]);
    }
}




