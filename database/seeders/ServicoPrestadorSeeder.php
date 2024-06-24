<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestador;
use App\Models\Servico;
use App\Models\ServicoPrestador;

class ServicoPrestadorSeeder extends Seeder
{
    public function run()
    {
        $prestadores = Prestador::all();
        $servicos = Servico::all();

        foreach ($prestadores as $prestador) {
            foreach ($servicos as $servico) {
                ServicoPrestador::create([
                    'prestador_id' => $prestador->id,
                    'servico_id' => $servico->id,
                    'km_saida' => rand(10, 50),
                    'valor_saida' => rand(20, 100),
                    'valor_km_excedente' => rand(5, 20)
                ]);
            }
        }
    }
}