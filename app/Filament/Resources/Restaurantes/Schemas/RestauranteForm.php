<?php

namespace App\Filament\Resources\Restaurantes\Schemas;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Schema;

class RestauranteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('nome')
                            ->label('Nome do Restaurante')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('cnpj')
                            ->label('CNPJ')
                            ->mask('99.999.999/9999-99')
                            ->maxLength(18)
                            ->unique(ignoreRecord: true),

                        Textarea::make('endereco')
                            ->label('Endereço')
                            ->rows(3)
                            ->maxLength(65535),

                        TextInput::make('telefone')
                            ->label('Telefone')
                            ->mask('(99) 99999-9999')
                            ->maxLength(20),

                        TextInput::make('email')
                            ->label('E-mail')
                            ->email()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'ativo' => 'Ativo',
                                'inativo' => 'Inativo',
                                'suspenso' => 'Suspenso',
                            ])
                            ->default('ativo')
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }
}




