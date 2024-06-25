<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestador;
use Illuminate\Support\Facades\Response;

class PrestadorController extends Controller
{
    /**
     * Armazena um novo prestador no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida os dados do formulário
        $validatedData = $request->validate([
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:prestadors,email',
        ]);

        // Cria um novo prestador com os dados validados
        $prestador = new Prestador;
        $prestador->fill($validatedData);
        $prestador->save();

        // Retorna uma resposta ou redireciona
        return response()->json([
            'message' => 'Prestador criado com sucesso!',
            'prestador' => $prestador
        ], 201);
    }

    // Adicione mais métodos conforme necessário...
}