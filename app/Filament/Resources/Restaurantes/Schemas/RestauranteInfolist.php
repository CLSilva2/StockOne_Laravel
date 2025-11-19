<?php

namespace App\Filament\Resources\Restaurantes\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RestauranteInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informações Básicas')
                    ->schema([
                        TextEntry::make('nome')
                            ->label('Nome'),
                        TextEntry::make('cnpj')
                            ->label('CNPJ'),
                        TextEntry::make('status')
                            ->label('Status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'ativo' => 'success',
                                'inativo' => 'gray',
                                'suspenso' => 'danger',
                                default => 'gray',
                            }),
                    ])
                    ->columns(3),
                Section::make('Contato')
                    ->schema([
                        TextEntry::make('email')
                            ->label('E-mail'),
                        TextEntry::make('telefone')
                            ->label('Telefone'),
                        TextEntry::make('endereco')
                            ->label('Endereço'),
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

