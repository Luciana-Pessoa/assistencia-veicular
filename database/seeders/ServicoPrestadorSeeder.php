<?php
// Define o namespace do arquivo

namespace Database\Seeders;
// Importa as classes necessárias

use Illuminate\Database\Seeder;
use App\Models\Prestador;
use App\Models\Servico;
use App\Models\ServicoPrestador;
// Declara a classe ServicoPrestadorSeeder que estende Seeder

class ServicoPrestadorSeeder extends Seeder
{
    // Método run que é chamado para executar o seeder
    public function run()
    {
        // Obtém todos os registros de Prestador e Servico
        $prestadores = Prestador::all();
        $servicos = Servico::all();

        // Para cada prestador, associa todos os serviços disponíveis
        foreach ($prestadores as $prestador) {
            foreach ($servicos as $servico) {
                // Cria uma nova associação no banco de dados para cada par prestador-serviço
                ServicoPrestador::create([
                    'prestador_id' => $prestador->id,
                    'servico_id' => $servico->id,
                    // Define valores aleatórios para km_saida, valor_saida e valor_km_excedente
                    'km_saida' => rand(10, 50),
                    'valor_saida' => rand(20, 100),
                    'valor_km_excedente' => rand(5, 20)
                ]);
            }