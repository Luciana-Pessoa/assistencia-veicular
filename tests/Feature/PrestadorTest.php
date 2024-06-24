<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Prestador;
use App\Models\Servico;
use App\Models\ServicoPrestador;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PrestadorTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_search_prestadores()
    {
        $servico = Servico::factory()->create();
        $prestador = Prestador::factory()->create();
        ServicoPrestador::create([
            'prestador_id' => $prestador->id,
            'servico_id' => $servico->id,
            'km_saida' => 10,
            'valor_saida' => 50.00,
            'valor_km_excedente' => 5.00
        ]);
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'api')
                         ->postJson('/api/prestadores', [
                             'origem' => ['latitude' => -23.5505, 'longitude' => -46.6333],
                             'destino' => ['latitude' => -22.9083, 'longitude' => -43.1964],
                             'servico_id' => $servico->id,
                             'quantidade' => 1
                         ]);

        $response->assertStatus(200)
                 ->assertJsonStructure([['id', 'nome', 'distancia_total', 'valor_total']]);
    }
}