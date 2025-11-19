<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    protected $fillable = [
        'restaurante_id',
        'usuario_id',
        'numero_pedido_externo',
        'plataforma_origem',
        'data_hora_pedido',
        'status',
        'valor_total',
        'tempo_preparo_estimado',
    ];

    protected function casts(): array
    {
        return [
            'data_hora_pedido' => 'datetime',
            'valor_total' => 'decimal:2',
            'tempo_preparo_estimado' => 'integer',
        ];
    }

    public function restaurante(): BelongsTo
    {
        return $this->belongsTo(Restaurante::class);
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function pedidoItens(): HasMany
    {
        return $this->hasMany(PedidoItem::class);
    }

    public function filasProducao(): HasMany
    {
        return $this->hasMany(FilaProducao::class);
    }
}
