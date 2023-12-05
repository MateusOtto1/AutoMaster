<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Validation\Rule;

class ClienteController extends Controller
{
    public function index(){
        return view('cliente.cadastroCliente');
    }

    public function store(Request $request){
        // Validação dos campos
        $request->validate([
            'nome' => 'required|max:255',
            'endereco' => 'required|max:255',
            'telefone' => 'required|max:15', // Ajuste o limite conforme necessário
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('clientes', 'email'), // Verifica se o email é único na tabela 'clientes'
            ],
        ]);

        // Verifica se o cliente já existe
        $clienteExistente = Cliente::where('email', $request->email)->first();
        if ($clienteExistente) {
            return redirect('/cadastro/cliente');
        }

        // Criar um novo cliente apenas se a validação for bem-sucedida e o cliente não existir
        $cliente = new Cliente;

        $cliente->nome = $request->nome;
        $cliente->endereco = $request->endereco;
        $cliente->telefone = $request->telefone;
        $cliente->email = $request->email;

        $cliente->save();

        return redirect('/home');
    }

    public function showAll()
    {
        $clientes = Cliente::all();
        return view('cliente.listarCliente', ['clientes' => $clientes]);
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);
        return view('cliente.editarCliente', ['cliente' => $cliente]);
    }
}
