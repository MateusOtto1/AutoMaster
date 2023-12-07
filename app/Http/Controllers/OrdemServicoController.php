<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrdemServico;
use App\Models\Cliente;
use App\Models\Veiculo;
use App\Models\Peca;
use App\Models\Equipe;

class OrdemServicoController extends Controller
{
    public function index()
    {
        $pecas = Peca::all();
        return view('ordemServico.cadastroOrdemServico', ['pecas' => $pecas]);
    }

    public function store(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'valor' => 'required|max:255',
            'descricao' => 'required|max:255',
            'data_emissao' => 'required|date',
            'data_conclusao' => 'required|date',
            'nome_equipe' => 'required|max:255',
            'placa' => 'required|max:255',
            'email' => 'required|max:255',
        ]);

        // Verifica se o cliente existe
        $cliente = Cliente::where('email', $request->email)->first();
        if (!$cliente) {
            return redirect('/cadastro/servico')->with('msg', 'Cliente não encontrado!');
        }

        // Verifica se o veículo existe
        $veiculo = Veiculo::where('placa', $request->placa)->first();
        if (!$veiculo) {
            return redirect('/cadastro/servico')->with('msg', 'Veículo não encontrado!');
        }

        if($veiculo->cliente_idcliente != $cliente->idcliente){
            return redirect('/cadastro/servico')->with('msg', 'Veículo não pertence ao cliente!');
        }

        // Verifica se a equipe existe
        $equipe = Equipe::where('nome', $request->nome_equipe)->first();
        if (!$equipe) {
            return redirect('/cadastro/servico')->with('msg', 'Equipe não encontrada!');
        }
        $pecasSelecionadas = $request->input('peca', []);

        // Cria uma nova ordem de serviço
        $ordemServico = new OrdemServico();
        $ordemServico->valor = $request->valor;
        $ordemServico->descricao = $request->descricao;
        $ordemServico->data_emissao = $request->data_emissao;
        $ordemServico->data_conclusao = $request->data_conclusao;
        $ordemServico->status = 0;
        $ordemServico->cliente_idcliente = $cliente->idcliente;
        $ordemServico->veiculo_idveiculo = $veiculo->idveiculo;
        $ordemServico->equipe_idequipe = $equipe->idequipe;
        // Calcula o valor total da ordem de serviço
        $valorTotal = $ordemServico->valor;
        $pecas = Peca::whereIn('idpeca', $pecasSelecionadas)->get();
        foreach ($pecas as $peca) {
            $valorTotal += $peca->preco;
        }
        $ordemServico->valor = $valorTotal;

        $ordemServico->save();

        // Adiciona as peças à ordem de serviço
        $ordemServico->pecas()->attach($pecasSelecionadas);
        return redirect('/home')->with('msg', 'Ordem de serviço cadastrada com sucesso!');
    }

    public function showAll()
    {
        $ordensServico = OrdemServico::all();
        $clientes = Cliente::all();
        $veiculos = Veiculo::all();
        $equipes = Equipe::all();

        foreach ($ordensServico as $ordemServico) {
            $pecas = $ordemServico->pecas;
            $valorTotalPecas = 0;
            foreach ($pecas as $peca) {
                $valorTotalPecas += $peca->preco;
            }
            $ordemServico->valorTotalPecas = $valorTotalPecas;
        }

        return view('home', ['ordensServico' => $ordensServico, 'clientes' => $clientes, 'veiculos' => $veiculos, 'equipes' => $equipes]);
    }


    public function show()
    {
        $ordensServico = OrdemServico::all();
        $clientes = Cliente::all();
        $veiculos = Veiculo::all();
        $equipes= Equipe::all();

        foreach ($ordensServico as $ordemServico) {
            $pecas = $ordemServico->pecas;
            $valorTotalPecas = 0;
            foreach ($pecas as $peca) {
                $valorTotalPecas += $peca->preco;
            }
            $ordemServico->valorTotalPecas = $valorTotalPecas;
        }

        return view('ordemServico.listarOrdemServico', ['ordensServico' => $ordensServico, 'clientes' => $clientes, 'veiculos' => $veiculos, 'equipes' => $equipes]);
    }

    public function destroy($idordem_servico)
    {
        $ordemServico = OrdemServico::findOrFail($idordem_servico);

        // Exclui as peças deste serviço na tabela ordem_servico_peca
        $ordemServico->pecas()->detach();

        $ordemServico->delete();
        return redirect('/home')->with('msg', 'Ordem de serviço excluída com sucesso!');
    }

    public function edit($idordem_servico)
    {
        $ordemServico = OrdemServico::findOrFail($idordem_servico);
        $pecas = Peca::all();
        $ordemServicoPecas = $ordemServico->pecas()->get();
        $cliente = Cliente::whereIn('idcliente', $ordemServico->pluck('cliente_idcliente'))->get(['email'])->implode('email', ', ');
        $veiculo = Veiculo::whereIn('idveiculo', $ordemServico->pluck('veiculo_idveiculo'))->get(['placa'])->implode('placa', ', ');
        $equipe = Equipe::whereIn('idequipe', $ordemServico->pluck('equipe_idequipe'))->get(['nome'])->implode('nome', ', ');

        // Calcula o valor total das peças na ordem de serviço
        $valorTotalPecas = 0;
        foreach ($ordemServicoPecas as $ordemServicoPeca) {
            $valorTotalPecas += $ordemServicoPeca->preco;
        }
        $valorTotalOrdemServico = $ordemServico->valor - $valorTotalPecas;

        return view('ordemServico.editarOrdemServico', ['ordemServico' => $ordemServico, 'pecas' => $pecas, 'ordemServicoPecas' => $ordemServicoPecas, 'cliente' => $cliente, 'veiculo' => $veiculo, 'equipe' => $equipe, 'valorTotalOrdemServico' => $valorTotalOrdemServico]);
    }

    public function update(Request $request, $idordem_servico)
    {
        // Validação dos campos
        $request->validate([
            'valor' => 'required|max:255',
            'descricao' => 'required|max:255',
            'data_emissao' => 'required|date',
            'data_conclusao' => 'required|date',
            'nome_equipe' => 'required|max:255',
            'placa' => 'required|max:255',
            'email' => 'required|max:255',
        ]);

        $ordemServico = OrdemServico::findOrFail($idordem_servico);

        // Verifica se o cliente existe
        $cliente = Cliente::where('email', $request->email)->first();
        if (!$cliente) {
            return redirect('/editar/servico/' . $idordem_servico)->with('msg', 'Cliente não encontrado!');
        }

        // Verifica se o veículo existe
        $veiculo = Veiculo::where('placa', $request->placa)->first();
        if (!$veiculo) {
            return redirect('/editar/servico/' . $idordem_servico)->with('msg', 'Veículo não encontrado!');
        }

        if($veiculo->cliente_idcliente != $cliente->idcliente){
            return redirect('/cadastro/servico')->with('msg', 'Veículo não pertence ao cliente!');
        }

        // Verifica se a equipe existe
        $equipe = Equipe::where('nome', $request->nome_equipe)->first();
        if (!$equipe) {
            return redirect('/editar/servico/' . $idordem_servico)->with('msg', 'Equipe não encontrada!');
        }

        $pecasSelecionadas = $request->input('peca', []);

        // Obter o valor das peças selecionadas
        $valorTotalPecas = 0;
        $pecas = Peca::whereIn('idpeca', $pecasSelecionadas)->get();
        foreach ($pecas as $peca) {
            $valorTotalPecas += $peca->preco;
        }
        if ($request->status == 1) {
            $ordemServico->status = 1;
        } else {
            $ordemServico->status = 0;
        }

        $ordemServico->valor = $request->valor + $valorTotalPecas;
        $ordemServico->descricao = $request->descricao;
        $ordemServico->data_emissao = $request->data_emissao;
        $ordemServico->data_conclusao = $request->data_conclusao;
        $ordemServico->cliente_idcliente = $cliente->idcliente;
        $ordemServico->veiculo_idveiculo = $veiculo->idveiculo;
        $ordemServico->equipe_idequipe = $equipe->idequipe;

        $ordemServico->save();

        $ordemServico->pecas()->detach();
        $ordemServico->pecas()->attach($pecasSelecionadas);

        return redirect('/listar/servico')->with('msg', 'Ordem de serviço atualizada com sucesso!');
    }

    public function concluir($idordem_servico)
    {
        $ordemServico = OrdemServico::findOrFail($idordem_servico);
        $ordemServico->status = 1;
        $ordemServico->save();
        return redirect('/listar/servico')->with('msg', 'Ordem de serviço concluída com sucesso!');
    }
}
