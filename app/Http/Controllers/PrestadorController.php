<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Prestador;
use App\Models\ServicoPrestador;

class PrestadorController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:prestadors,email',
        
        ]);

        $prestador = Prestador::create($validatedData);

        return response()->json($prestador, 201);
    }
}


class PrestadorController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'origem.latitude' => 'required|numeric|between:-90,90',
            'origem.longitude' => 'required|numeric|between:-180,180',
            'destino.latitude' => 'required|numeric|between:-90,90',
            'destino.longitude' => 'required|numeric|between:-180,180',
            'servico_id' => 'required|integer|exists:servicos,id',
            'quantidade' => 'integer|max:100',
            'ordenacao' => 'array',
            'filtros.cidade' => 'string',
            'filtros.UF' => 'string|size:2',
            'filtros.situacao' => 'string'
        ]);

        $origem = $request->input('origem');
        $destino = $request->input('destino');
        $servico_id = $request->input('servico_id');
        $quantidade = $request->input('quantidade', 10);
        $ordenacao = $request->input('ordenacao', []);
        $filtros = $request->input('filtros', []);

        $query = ServicoPrestador::where('servico_id', $servico_id)
            ->whereHas('prestador', function($q) use ($filtros) {
                if (isset($filtros['cidade'])) {
                    $q->where('cidade', $filtros['cidade']);
                }
                if (isset($filtros['UF'])) {
                    $q->where('UF', $filtros['UF']);
                }
                if (isset($filtros['situacao'])) {
                    $q->where('situacao', $filtros['situacao']);
                }
            });

        foreach ($ordenacao as $ordem) {
            $query->orderBy($ordem);
        }

        $prestadores = $query->take($quantidade)->get();

        $prestadores->map(function($prestador) use ($origem, $destino) {
            $distancia_total = $this->calcularDistanciaTotal($prestador->prestador, $origem, $destino);
            $valor_total = $this->calcularValorTotal($prestador, $distancia_total);
            $prestador->distancia_total = $distancia_total;
            $prestador->valor_total = $valor_total;
            return $prestador;
        });

        $prestadores_status = Http::withBasicAuth('teste-Infornet', 'c@nsulta-dad0s-ap1-teste-Infornet#24')
            ->post('https://teste-infornet.000webhostapp.com/api/prestadores/online', [
                'prestadores' => $prestadores->pluck('prestador_id')->toArray()
            ])->json();

        foreach ($prestadores as $prestador) {
            $prestador->situacao = $prestadores_status[$prestador->prestador_id] ?? 'offline';
        }

        return response()->json($prestadores);
    }

    private function calcularDistanciaTotal($prestador, $origem, $destino)
    {
        $distancia1 = $this->calcularDistancia($prestador->latitude, $prestador->longitude, $origem['latitude'], $origem['longitude']);
        $distancia2 = $this->calcularDistancia($origem['latitude'], $origem['longitude'], $destino['latitude'], $destino['longitude']);
        $distancia3 = $this->calcularDistancia($destino['latitude'], $destino['longitude'], $prestador->latitude, $prestador->longitude);

        return $distancia1 + $distancia2 + $distancia3;
    }

    private function calcularDistancia($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        return ($miles * 1.609344);
    }

    private function calcularValorTotal($prestador, $distancia_total)
    {
        $km_excedente = max(0, $distancia_total - $prestador->km_saida);
        return $prestador->valor_saida + ($km_excedente * $prestador->valor_km_excedente);
    }
}




