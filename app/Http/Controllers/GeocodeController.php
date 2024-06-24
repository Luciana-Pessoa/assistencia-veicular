<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeocodeController extends Controller
{
    public function show($endereco)
    {
        $response = Http::withBasicAuth('teste-Infornet', 'c@nsulta-dad0s-ap1-teste-Infornet#24')
                        ->get("https://teste-infornet.000webhostapp.com/api/endereco/geocode/{$endereco}");

        return $response->json();
    }
}