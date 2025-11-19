<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alerta extends Model
{
    use HasFactory;

    protected $table = 'alertas';

    protected $fillable = [
        'insumo_id',
        'tipo_alerta',
        'mensagem',
        'data_hora_alerta',
        'visualizado',
        'resolvido',
    ];

    protected function casts(): array
    {
        return [
            'data_hora_alerta' => 'datetime',
            'visualizado' => 'boolean',
            'resolvido' => 'boolean',
        ];
    }

    public function insumo(): BelongsTo
    {
        return $this->belongsTo(Insumo::class);
    }
}
