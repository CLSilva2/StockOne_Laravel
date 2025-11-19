<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CardapioItem extends Model
{
    use HasFactory;

    protected $table = 'cardapio_itens';

    protected $fillable = [
        'restaurante_id',
        'nome',
        'descricao',
        'preco_venda',
        'tempo_preparo_minutos',
        'complexidade_preparo',
        'categoria',
        'ativo_online',
    ];

    protected function casts(): array
    {
        return [
            'preco_venda' => 'decimal:2',
            'tempo_preparo_minutos' => 'integer',
            'complexidade_preparo' => 'integer',
            'ativo_online' => 'boolean',
        ];
    }

    public function restaurante(): BelongsTo
    {
        return $this->belongsTo(Restaurante::class);
    }

    public function receitas(): HasMany
    {
        return $this->hasMany(Receita::class);
    }

    public function insumos(): BelongsToMany
    {
        return $this->belongsToMany(Insumo::class, 'receitas', 'cardapio_item_id', 'insumo_id')
            ->withPivot('quantidade_necessaria', 'essencial')
            ->withTimestamps();
    }

    public function pedidoItens(): HasMany
    {
        return $this->hasMany(PedidoItem::class);
    }
}
