<?php

namespace App\Filament\Resources\Estoque\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EstoqueInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informações do Estoque')
                    ->schema([
                        TextEntry::make('insumo.nome')
                            ->label('Insumo'),
                        TextEntry::make('insumo.restaurante.nome')
                            ->label('Restaurante'),
                        TextEntry::make('quantidade_atual')
                            ->label('Quantidade Atual')
                            ->numeric(decimalPlaces: 3),
                        TextEntry::make('insumo.unidade_medida')
                            ->label('Unidade de Medida')
                            ->badge(),
                    ])
                    ->columns(2),
                Section::make('Controle de Estoque')
                    ->schema([
                        TextEntry::make('insumo.ponto_reposicao_minimo')
                            ->label('Ponto de Reposição Mínimo')
                            ->numeric(decimalPlaces: 2)
                            ->color(fn ($record) => $record->quantidade_atual <= $record->insumo->ponto_reposicao_minimo ? 'danger' : 'gray'),
                        TextEntry::make('localizacao')
                            ->label('Localização'),
                    ])
                    ->columns(2),
                Section::make('Datas')
                    ->schema([
                        TextEntry::make('created_at')
                            ->label('Criado em')
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->label('Última Atualização')
                            ->dateTime(),
                    ])
                    ->columns(2),
            ]);
    }
}

