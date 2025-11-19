<?php

namespace App\Filament\Resources\CardapioItens\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CardapioItemInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informações Básicas')
                    ->schema([
                        TextEntry::make('nome')
                            ->label('Nome'),
                        TextEntry::make('restaurante.nome')
                            ->label('Restaurante'),
                        TextEntry::make('categoria')
                            ->label('Categoria'),
                        TextEntry::make('descricao')
                            ->label('Descrição'),
                    ])
                    ->columns(2),
                Section::make('Preço e Preparo')
                    ->schema([
                        TextEntry::make('preco_venda')
                            ->label('Preço de Venda')
                            ->money('BRL'),
                        TextEntry::make('tempo_preparo_minutos')
                            ->label('Tempo de Preparo')
                            ->suffix(' minutos'),
                        TextEntry::make('complexidade_preparo')
                            ->label('Complexidade')
                            ->formatStateUsing(fn (int $state): string => match ($state) {
                                1 => 'Baixa',
                                2 => 'Média',
                                3 => 'Alta',
                                default => 'N/A',
                            }),
                        TextEntry::make('ativo_online')
                            ->label('Ativo Online')
                            ->boolean(),
                    ])
                    ->columns(4),
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

