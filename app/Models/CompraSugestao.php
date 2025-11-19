<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompraSugestao extends Model
{
    use HasFactory;

    protected $table = 'compras_sugestoes';

    protected $fillable = [
        'insumo_id',
        'quantidade_sugerida',
        'justificativa',
        'status',
        'periodo_analise_dias',
        'data_geracao',
    ];

    protected function casts(): array
    {
        return [
            'quantidade_sugerida' => 'decimal:3',
            'periodo_analise_dias' => 'integer',
            'data_geracao' => 'date',
        ];
    }

    public function insumo(): BelongsTo
    {
        return $this->belongsTo(Insumo::class);
    }
}
