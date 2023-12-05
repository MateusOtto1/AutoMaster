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
            ],
        ]);

        // Verifica se o cliente já existe
        $clienteExistente = Cliente::where('email', $request->email)->first();
        if ($clienteExistente) {
            return redirect('/cadastro/cliente')->with('msg', 'Cliente já está cadastrado!');
        }

        // Criar um novo cliente apenas se a validação for bem-sucedida e o cliente não existir
        $cliente = new Cliente;

        $cliente->nome = $request->nome;
        $cliente->endereco = $request->endereco;
        $cliente->telefone = $request->telefone;
        $cliente->email = $request->email;

        $cliente->save();

        return redirect('/home')->with('msg', 'Cliente cadastrado com sucesso!');
    }

    public function showAll()
    {
        $clientes = Cliente::all();
        return view('cliente.listarCliente', ['clientes' => $clientes]);
    }

    public function show($idcliente)
    {
        $cliente = Cliente::find($idcliente);
        return view('cliente.editarCliente', ['cliente' => $cliente]);
    }

    public function destroy($idcliente)
    {
        $cliente = Cliente::findOrFail($idcliente);
        $cliente->delete();
        return redirect('/listar/cliente')->with('msg', 'Cliente excluído com sucesso!');
    }

    public function edit($idcliente)
    {
        $cliente = Cliente::findOrFail($idcliente);
        return view('cliente.editarCliente', ['cliente' => $cliente]);
    }

    public function update(Request $request, $idcliente)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'endereco' => 'required|max:255',
            'telefone' => 'required|max:15', // Ajuste o limite conforme necessário
            'email' => [
                'required',
                'email',
                'max:255',
            ],
        ]);

        $cliente = Cliente::findOrFail($idcliente);

        $cliente->nome = $request->nome;
        $cliente->endereco = $request->endereco;
        $cliente->telefone = $request->telefone;
        $cliente->email = $request->email;

        $cliente->save();

        return redirect('/listar/cliente')->with('msg', 'Cliente atualizado com sucesso!');
    }
}
