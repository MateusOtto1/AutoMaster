<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;
use App\Models\Cliente;

class VeiculoController extends Controller
{
    public function index()
    {
        return view('veiculo.cadastroVeiculo');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'modelo' => 'required|string',
            'cor' => 'required|string',
            'ano' => 'required|date',
            'placa' => 'required|string|unique:veiculos',
        ]);

        // Verifica se o e-mail do dono existe entre os clientes
        $cliente = Cliente::where('email', $request->email)->first();

        if (!$cliente) {
            // Se o cliente não existir, exibe uma mensagem de erro
            return redirect('/cadastro/veiculo');
        }

        // Verifica se a placa do veículo já existe
        $placaExistente = Veiculo::where('placa', $request->placa)->exists();

        if ($placaExistente) {
            // Se a placa já existir, exibe uma mensagem de erro
            return redirect('/cadastro/veiculo');
        }

        // Cria um novo veículo
        $veiculo = new Veiculo();
        $veiculo->modelo = $request->modelo;
        $veiculo->cor = $request->cor;
        $veiculo->ano = $request->ano;
        $veiculo->placa = $request->placa;
        $veiculo->cliente_idcliente = $cliente->idcliente;
        $veiculo->save();

        return redirect('/home');
    }

    public function showAll()
    {
        $veiculos = Veiculo::all();
        return view('veiculo.listarVeiculos', ['veiculos' => $veiculos]);
    }

    public function show($id)
    {
        $veiculo = Veiculo::find($id);
        return view('veiculo.editarVeiculo', ['veiculo' => $veiculo]);
    }
}

