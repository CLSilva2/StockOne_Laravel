<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Receita extends Model
{
    use HasFactory;

    protected $table = 'receitas';

    protected $fillable = [
        'cardapio_item_id',
        'insumo_id',
        'quantidade_necessaria',
        'essencial',
    ];

    protected function casts(): array
    {
        return [
            'quantidade_necessaria' => 'decimal:2',
            'essencial' => 'boolean',
        ];
    }

    public function cardapioItem(): BelongsTo
    {
        return $this->belongsTo(CardapioItem::class);
    }

    public function insumo(): BelongsTo
    {
        return $this->belongsTo(Insumo::class);
    }
}
