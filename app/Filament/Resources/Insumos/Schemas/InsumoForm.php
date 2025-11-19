<?php

namespace App\Filament\Resources\Insumos\Schemas;

use App\Models\Restaurante; // Para o relacionamento
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Schema;

class InsumoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Card::make()
                    ->schema([
                        // 1. Multi-Tenancy (restaurante_id)
                        // Este campo será ocultado/preenchido automaticamente com políticas (Policies) no futuro.
                        Select::make('restaurante_id')
                            ->label('Restaurante')
                            ->required()
                            ->relationship('restaurante', 'nome') // Assume que o modelo Restaurante tem um campo 'nome'
                            ->searchable()
                            ->preload(),

                        // 2. Nome do Insumo
                        TextInput::make('nome')
                            ->label('Nome do Insumo/Matéria-Prima')
                            ->placeholder('Ex: Farinha de Trigo Tipo 1')
                            ->required()
                            ->maxLength(255),

                        // 3. Unidade de Medida (Ex: KG, UN, LT)
                        // É recomendado usar um ENUM ou uma tabela separada para unidades de medida no futuro,
                        // mas um Select simples serve por agora.
                        Select::make('unidade_medida')
                            ->label('Unidade de Medida')
                            ->options([
                                'KG' => 'Quilograma (KG)',
                                'GR' => 'Grama (GR)',
                                'LT' => 'Litro (LT)',
                                'ML' => 'Mililitro (ML)',
                                'UN' => 'Unidade (UN)',
                            ])
                            ->required(),
                        
                        // 4. Ponto de Reposição Mínimo (Para Alerta de Estoque)
                        TextInput::make('ponto_reposicao_minimo')
                            ->label('Ponto de Reposição Mínimo')
                            ->helperText('Quantidade mínima para gerar um alerta de estoque baixo.')
                            ->numeric()
                            ->minValue(0)
                            ->required()
                            ->default(0),

                        // Campos para timestamp (apenas para visualização/debug se necessário)
                        // TextInput::make('created_at')->disabled(), 
                    ])
                    ->columns(2), // Organiza os campos em duas colunas no Card
            ]);
    }
}