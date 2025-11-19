<?php

namespace App\Filament\Resources\Estoque\Schemas;

use App\Models\Insumo;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Schema;

class EstoqueForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Card::make()
                    ->schema([
                        Select::make('insumo_id')
                            ->label('Insumo')
                            ->required()
                            ->relationship('insumo', 'nome')
                            ->searchable()
                            ->preload()
                            ->unique(ignoreRecord: true)
                            ->helperText('Cada insumo pode ter apenas um registro de estoque'),

                        TextInput::make('quantidade_atual')
                            ->label('Quantidade Atual')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->step(0.001),

                        TextInput::make('localizacao')
                            ->label('Localização')
                            ->maxLength(255)
                            ->placeholder('Ex: Estoque Principal, Geladeira A'),
                    ])
                    ->columns(2),
            ]);
    }
}




