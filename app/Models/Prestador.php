<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestador extends Model;
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'logradouro',
        'bairro',
        'numero',
        'latitude',
        'longitude',
        'cidade',
        'uf',
        'situacao'
    ];
}