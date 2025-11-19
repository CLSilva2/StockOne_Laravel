<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FilaProducao extends Model
{
    use HasFactory;

    protected $table = 'fila_producao';

    protected $fillable = [
        'pedido_item_id',
        'pedido_id',
        'status_producao',
        'prioridade',
        'data_hora_inicio',
        'data_hora_fim',
    ];

    protected function casts(): array
    {
        return [
            'prioridade' => 'integer',
            'data_hora_inicio' => 'datetime',
            'data_hora_fim' => 'datetime',
        ];
    }

    public function pedidoItem(): BelongsTo
    {
        return $this->belongsTo(PedidoItem::class);
    }

    public function pedido(): BelongsTo
    {
        return $this->belongsTo(Pedido::class);
    }
}
