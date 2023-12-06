<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mecanico;

class MecanicoController extends Controller
{
    public function index()
    {
        return view('mecanico.cadastroMecanico');
    }

    public function store(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'nome' => 'required|max:255',
            'especialidade' => 'required|max:255',
            'email' => 'required|max:255',
        ]);

        // Verifica se o mecanico já existe
        $mecanicoExistente = Mecanico::where('email', $request->email)->first();
        if ($mecanicoExistente) {
            return redirect('/cadastro/mecanico')->with('msg', 'Mecânico já está cadastrado!');
        }

        // Criar um novo mecanico apenas se a validação for bem-sucedida e o mecanico não existir
        $mecanico = new Mecanico;
        $mecanico->nome = $request->nome;
        $mecanico->especialidade = $request->especialidade;
        $mecanico->email = $request->email;
        $mecanico->save();

        return redirect('/home')->with('msg', 'Mecânico cadastrado com sucesso!');
    }

    public function showAll()
    {
        $mecanicos = Mecanico::all();
        return view('mecanico.listarMecanico', ['mecanicos' => $mecanicos]);
    }

    public function destroy($idmecanico)
    {
        $mecanico = Mecanico::findOrFail($idmecanico);
        $mecanico->delete();
        return redirect('/listar/mecanico')->with('msg', 'Mecânico excluído com sucesso!');
    }

    public function edit($idmecanico)
    {
        $mecanico = Mecanico::findOrFail($idmecanico);
        return view('mecanico.editarMecanico', ['mecanico' => $mecanico]);
    }

    public function update(Request $request, $idmecanico)
    {
        // Validação dos campos
        $request->validate([
            'nome' => 'required|max:255',
            'especialidade' => 'required|max:255',
            'email' => 'required|max:255',
        ]);

        // Verifica se o mecanico já existe
        $mecanicoExistente = Mecanico::where('email', $request->email)->where('idmecanico', '!=', $idmecanico)->first();
        if ($mecanicoExistente) {
            return redirect('/editar/mecanico/'.$idmecanico)->with('msg', 'Mecânico já está cadastrado!');
        }

        // Atualiza o mecanico apenas se a validação for bem-sucedida e o mecanico não existir
        $mecanico = Mecanico::findOrFail($idmecanico);
        $mecanico->nome = $request->nome;
        $mecanico->especialidade = $request->especialidade;
        $mecanico->email = $request->email;
        $mecanico->save();

        return redirect('/listar/mecanico')->with('msg', 'Mecânico atualizado com sucesso!');
    }
}
