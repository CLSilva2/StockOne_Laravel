<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estoque extends Model
{
    use HasFactory;

    protected $table = 'estoque';

    protected $fillable = [
        'insumo_id',
        'quantidade_atual',
        'localizacao',
    ];

    protected function casts(): array
    {
        return [
            'quantidade_atual' => 'decimal:3',
        ];
    }

    public function insumo(): BelongsTo
    {
        return $this->belongsTo(Insumo::class);
    }
}
