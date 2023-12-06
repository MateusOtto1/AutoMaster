<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipe;
use App\Models\Mecanico;

class EquipeController extends Controller
{
    public function index()
    {
        $mecanicos = Mecanico::all();
        return view('equipe.cadastroEquipe', ['mecanicos' => $mecanicos]);
    }

    public function store(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'nome' => 'required|max:255',
        ]);

        // Verifica se a equipe já existe
        $equipeExistente = Equipe::where('nome', $request->nome)->first();
        if ($equipeExistente) {
            return redirect('/cadastro/equipe')->with('msg', 'Equipe já está cadastrada!');
        }

        // Pegar os IDs dos mecânicos selecionados no checkbox da view
        $mecanicosSelecionados = $request->input('mecanico', []);

        // Criar uma nova equipe apenas se a validação for bem-sucedida e a equipe não existir
        $equipe = new Equipe;
        $equipe->nome = $request->nome;
        $equipe->save();

        // Associar os mecânicos selecionados à equipe
        $equipe->mecanicos()->attach($mecanicosSelecionados);

        return redirect('/home')->with('msg', 'Equipe cadastrada com sucesso!');
    }

    public function showAll()
    {
        $equipes = Equipe::all();
        return view('equipe.listarEquipe', ['equipes' => $equipes]);
    }

    public function destroy($idequipe)
    {
        $equipe = Equipe::findOrFail($idequipe);
        // Deletar as chaves na tabela equipe_mecanico
        $equipe->mecanicos()->detach();
        $equipe->delete();
        return redirect('/listar/equipe')->with('msg', 'Equipe excluída com sucesso!');
    }

    public function edit($idequipe)
    {
        $equipe = Equipe::findOrFail($idequipe);
        $mecanicos = Mecanico::all();
        $equipeMecanicos = $equipe->mecanicos()->get();
        return view('equipe.editarEquipe', ['equipe' => $equipe, 'mecanicos' => $mecanicos, 'equipeMecanicos' => $equipeMecanicos]);
    }

    public function update(Request $request, $idequipe)
    {
        // Validação dos campos
        $request->validate([
            'nome' => 'required|max:255',
        ]);

        $equipe = Equipe::findOrFail($idequipe);

        $equipeExistente = Equipe::where('nome', $request->nome)->where('idequipe', '!=', $idequipe)->first();
        if ($equipeExistente) {
            return redirect('/editar/equipe/'.$idequipe)->with('msg', 'Equipe já está cadastrada!');
        }

        // Pegar os IDs dos mecânicos selecionados no checkbox da view
        $mecanicosSelecionados = $request->input('mecanico', []);

        $equipe->nome = $request->nome;
        $equipe->save();

        // Atualizar os mecânicos associados à equipe
        $equipe->mecanicos()->sync($mecanicosSelecionados);

        return redirect('/listar/equipe')->with('msg', 'Equipe atualizada com sucesso!');
    }
}
