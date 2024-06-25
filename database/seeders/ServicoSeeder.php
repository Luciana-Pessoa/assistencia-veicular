<?php
// Início do arquivo PHP e definição do namespace

namespace Database\Seeders;
// Importação de dependências

use Illuminate\Database\Seeder;
use App\Models\Servico;
// Definição da classe ServicoSeeder que estende a classe Seeder

class ServicoSeeder extends Seeder
{
    // Método run que é chamado para executar o seeder
    public function run()
    {
        // Array de serviços a serem inseridos no banco de dados
        $servicos = [
            ['nome' => 'Reboque', 'situacao' => 'ativo'],
            ['nome' => 'Chaveiro', 'situacao' => 'ativo'],
            ['nome' => 'Mecânico', 'situacao' => 'ativo']
        ];

        // Loop para inserir cada serviço no banco de dados
        foreach ($servicos as $servico) {
            Servico::create($servico);
        }
    }
}