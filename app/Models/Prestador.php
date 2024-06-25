<?php
// Início do arquivo PHP

namespace App\Models; // Define o namespace do modelo

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importa o trait HasFactory para a classe
use Illuminate\Database\Eloquent\Model; // Importa a classe base Model do Eloquent

// Declaração da classe Prestador, que estende a classe Model do Eloquent
class Prestador extends Model
{
    use HasFactory; // Utiliza o trait HasFactory para permitir a geração de fábricas para o modelo

    // Define os atributos que podem ser atribuídos em massa
    protected $fillable = [
        'nome', 'logradouro', 'bairro', 'numero', 'latitude', 'longitude', 'cidade', 'UF', 'situacao'
    ];

    // Método servicos que define o relacionamento N:N (muitos para muitos) com o modelo Servico
    public function servicos()
    {
        // Retorna o relacionamento, especificando a tabela pivot 'servico_prestadors' e as colunas adicionais na pivot
        return $this->belongsToMany(Servico::class, 'servico_prestadors')
            ->withPivot('km_saida', 'valor_saida', 'valor_km_excedente');
    }
}