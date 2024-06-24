<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servico;

class ServicoSeeder extends Seeder
{
    public function run()
    {
        $servicos = [
            ['nome' => 'Reboque', 'situacao' => 'ativo'],
            ['nome' => 'Chaveiro', 'situacao' => 'ativo'],
            ['nome' => 'Mecânico', 'situacao' => 'ativo']
        ];

        foreach ($servicos as $servico) {
            Servico::create($servico);
        }
    }
}