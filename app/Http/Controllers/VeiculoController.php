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
            'placa' => 'required|string',
        ]);

        // Verifica se o e-mail do dono existe entre os clientes
        $cliente = Cliente::where('email', $request->email)->first();
        if (!$cliente) {
            // Se o cliente não existir, exibe uma mensagem de erro
            return redirect('/cadastro/veiculo')->with('msg', 'Cliente não encontrado!');
        }

        // Verifica se a placa do veículo já existe
        $placaExistente = Veiculo::where('placa', $request->placa)->exists();
        if ($placaExistente) {
            // Se a placa já existir, exibe uma mensagem de erro
            return redirect('/cadastro/veiculo')->with('msg', 'Veículo já cadastrado!');
        }

        // Cria um novo veículo
        $veiculo = new Veiculo();
        $veiculo->modelo = $request->modelo;
        $veiculo->cor = $request->cor;
        $veiculo->ano = $request->ano;
        $veiculo->placa = $request->placa;
        $veiculo->cliente_idcliente = $cliente->idcliente;
        $veiculo->save();

        return redirect('/home')->with('msg', 'Veículo cadastrado com sucesso!');
    }

    public function showAll()
    {
        $veiculos = Veiculo::all();
        $clientes = Cliente::whereIn('idcliente', $veiculos->pluck('cliente_idcliente'))->get();
        return view('veiculo.listarVeiculo', ['veiculos' => $veiculos, 'clientes' => $clientes]);
    }

    public function destroy($idveiculo)
    {
        $veiculo = Veiculo::findOrFail($idveiculo);
        $veiculo->delete();
        return redirect('/listar/veiculo')->with('msg', 'Veículo excluído com sucesso!');
    }

    public function edit($idveiculo)
    {
        $veiculo = Veiculo::findOrFail($idveiculo);
        $cliente = Cliente::findOrFail($veiculo->cliente_idcliente);
        return view('veiculo.editarVeiculo', ['veiculo' => $veiculo, 'cliente' => $cliente]);
    }

    public function update(Request $request, $idveiculo)
    {
        $request->validate([
            'modelo' => 'required|string',
            'cor' => 'required|string',
            'ano' => 'required|date',
            'placa' => 'required|string',
            'email' => 'required|email',
        ]);

        $veiculo = Veiculo::findOrFail($idveiculo);

        // Verifica se o e-mail do dono existe entre os clientes
        $cliente = Cliente::where('email', $request->email)->first();
        if (!$cliente) {
            // Se o cliente não existir, exibe uma mensagem de erro
            return redirect('/editar/veiculo/'.$idveiculo)->with('msg', 'Cliente não encontrado!');
        }

        // Verifica se a placa do veículo já existe
        $placaExistente = Veiculo::where('placa', $request->placa)->where('idveiculo', '!=', $idveiculo)->first();
        if ($placaExistente) {
            // Se a placa já existir, exibe uma mensagem de erro
            return redirect('/editar/veiculo/'.$idveiculo)->with('msg', 'Veículo já cadastrado!');
        }

        $veiculo->modelo = $request->modelo;
        $veiculo->cor = $request->cor;
        $veiculo->ano = $request->ano;
        $veiculo->placa = $request->placa;
        $veiculo->cliente_idcliente = $cliente->idcliente;
        $veiculo->save();

        return redirect('/listar/veiculo')->with('msg', 'Veículo atualizado com sucesso!');
    }
}

