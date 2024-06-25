<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestador;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:prestadors,email',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Cria um novo prestador com os dados validados
        $prestador = Prestador::create($validator->validated());

        // Retorna uma resposta de sucesso
        return response()->json([
            'message' => 'Prestador criado com sucesso!',
            'prestador' => $prestador
        ], 201);
    }
}