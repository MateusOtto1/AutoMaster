<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peca;

class PecaController extends Controller
{
    public function index(){
        return view('peca.cadastroPeca');
    }

    public function store(Request $request){
        // Validação dos campos
        $request->validate([
            'tipo_peca' => 'required|max:255',
            'preco' => 'required|max:255',
        ]);

        // Verifica se a peça já existe
        $pecaExistente = Peca::where('tipo_peca', $request->tipo_peca)->first();
        if ($pecaExistente) {
            return redirect('/cadastro/peca')->with('msg', 'Peça já está cadastrada!');
        }

        // Criar uma nova peça apenas se a validação for bem-sucedida e a peça não existir
        $peca = new Peca;
        $peca->tipo_peca = $request->tipo_peca;
        $peca->preco = $request->preco;
        $peca->save();

        return redirect('/home')->with('msg', 'Peça cadastrada com sucesso!');
    }

    public function showAll()
    {
        $pecas = Peca::all();
        return view('peca.listarPeca', ['pecas' => $pecas]);
    }

    public function destroy($idpeca)
    {
        $peca = Peca::findOrFail($idpeca);
        $peca->delete();
        return redirect('/listar/peca')->with('msg', 'Peça excluída com sucesso!');
    }

    public function edit($idpeca)
    {
        $peca = Peca::findOrFail($idpeca);
        return view('peca.editarPeca', ['peca' => $peca]);
    }

    public function update(Request $request, $idpeca)
    {
        // Validação dos campos
        $request->validate([
            'tipo_peca' => 'required|max:255',
            'preco' => 'required|max:255',// Ajuste o limite conforme necessário
        ]);

        $peca = Peca::findOrFail($idpeca);

        $pecaExistente = Peca::where('tipo_peca', $request->tipo_peca)->where('idpeca', '!=', $idpeca)->first();
        if ($pecaExistente) {
            return redirect('/editar/peca/'.$idpeca)->with('msg', 'Peça já está cadastrada!');
        }

        $peca->tipo_peca = $request->tipo_peca;
        $peca->preco = $request->preco;

        $peca->save();

        return redirect('/listar/peca')->with('msg', 'Peça atualizada com sucesso!');
    }
}
