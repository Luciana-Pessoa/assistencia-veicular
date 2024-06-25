<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServicoPrestador extends Model
{
    use HasFactory;

    protected $fillable = [
        'prestador_id',
        'servico_id',
        'km_saida',
        'valor_saida',
        'valor_km_excedente'
    ];

    public function prestador()
    {
        return $this->belongsTo(Prestador::class);
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }
}