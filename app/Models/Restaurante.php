<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurante extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'restaurantes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'cnpj',
        'endereco',
        'telefone',
        'email',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            //
        ];
    }

    /**
     * Relacionamento: Um restaurante tem muitos insumos
     *
     * @return HasMany
     */
    public function insumos(): HasMany
    {
        return $this->hasMany(Insumo::class);
    }

    /**
     * Relacionamento: Um restaurante tem muitos itens do cardápio
     *
     * @return HasMany
     */
    public function cardapioItens(): HasMany
    {
        return $this->hasMany(CardapioItem::class);
    }

    /**
     * Relacionamento: Um restaurante tem muitos pedidos
     *
     * @return HasMany
     */
    public function pedidos(): HasMany
    {
        return $this->hasMany(Pedido::class);
    }
}

