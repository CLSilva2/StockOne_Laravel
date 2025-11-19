<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Insumo extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'insumos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'restaurante_id',
        'nome',
        'descricao',
        'categoria',
        'unidade_medida',
        'ponto_reposicao_minimo',
        'custo_unitario',
        'data_validade_minima',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'ponto_reposicao_minimo' => 'decimal:2',
            'custo_unitario' => 'decimal:2',
            'data_validade_minima' => 'date',
        ];
    }

    /**
     * Relacionamento: Um insumo pertence a um restaurante
     *
     * @return BelongsTo
     */
    public function restaurante(): BelongsTo
    {
        return $this->belongsTo(Restaurante::class);
    }

    /**
     * Relacionamento: Um insumo tem um estoque (1:1)
     *
     * @return HasOne
     */
    public function estoque(): HasOne
    {
        return $this->hasOne(Estoque::class);
    }

    /**
     * Relacionamento: Um insumo tem muitos alertas
     *
     * @return HasMany
     */
    public function alertas(): HasMany
    {
        return $this->hasMany(Alerta::class);
    }

    /**
     * Relacionamento: Um insumo tem muitas sugestões de compra
     *
     * @return HasMany
     */
    public function comprasSugestoes(): HasMany
    {
        return $this->hasMany(CompraSugestao::class);
    }

    /**
     * Relacionamento: Um insumo pertence a muitos itens do cardápio (via receitas)
     *
     * @return BelongsToMany
     */
    public function cardapioItens(): BelongsToMany
    {
        return $this->belongsToMany(CardapioItem::class, 'receitas', 'insumo_id', 'cardapio_item_id')
            ->withPivot('quantidade_necessaria', 'essencial')
            ->withTimestamps();
    }
}

