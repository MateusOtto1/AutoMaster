<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index(){
        return view('cadastroCliente');
    }

    public function store(Request $request){
        $cliente = new Cliente;

        $cliente->nome = $request->nome;
        $cliente->endereco = $request->endereco;
        $cliente->telefone = $request->telefone;
        $cliente->email = $request->email;

        $cliente->save();

        return redirect('/home');
    }
}
