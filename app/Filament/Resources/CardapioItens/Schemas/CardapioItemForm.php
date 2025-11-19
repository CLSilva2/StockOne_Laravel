<?php

namespace App\Filament\Resources\CardapioItens\Schemas;

use App\Models\Restaurante;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Schema;

class CardapioItemForm
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

                        TextInput::make('nome')
                            ->label('Nome do Item')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('descricao')
                            ->label('Descrição')
                            ->rows(3)
                            ->maxLength(65535),

                        TextInput::make('preco_venda')
                            ->label('Preço de Venda (R$)')
                            ->numeric()
                            ->prefix('R$')
                            ->required()
                            ->minValue(0),

                        TextInput::make('tempo_preparo_minutos')
                            ->label('Tempo de Preparo (minutos)')
                            ->numeric()
                            ->suffix('min')
                            ->minValue(0),

                        Select::make('complexidade_preparo')
                            ->label('Complexidade')
                            ->options([
                                1 => 'Baixa',
                                2 => 'Média',
                                3 => 'Alta',
                            ])
                            ->default(1)
                            ->required(),

                        TextInput::make('categoria')
                            ->label('Categoria')
                            ->maxLength(100)
                            ->placeholder('Ex: Entrada, Prato Principal, Sobremesa'),

                        Toggle::make('ativo_online')
                            ->label('Ativo Online')
                            ->default(true)
                            ->helperText('Disponível para venda online'),
                    ])
                    ->columns(2),
            ]);
    }
}




