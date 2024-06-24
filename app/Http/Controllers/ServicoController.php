<?php
namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function index()
    {
        return Servico::all();
    }
}