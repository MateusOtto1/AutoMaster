@extends('layouts.main')
@section('content')
    <div class="containerListagens">
        <h1 class="listagem">Todas Equipes do AutoMaster</h1>
        @if(session('msg'))
            <div class="alert alert-success alertHome alert-dismissible fade show" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="containerListagemClientes">
            <div class="containerBgListar">
                @if ($equipes->isEmpty())
                    <h1 class="listagem2">Não há equipes cadastrados</h1>
                @endif
                @foreach ($equipes as $equipe)
                    <div class="containerClienteAll">
                        <div class="containerClienteNome">
                            <h1 class="nomeCliente">Nome: <p class="clienteNome">{{ $equipe->nome }}</p></h1>
                        </div>
                        <div class="containerClienteEditar">
                            <form action="/editar/equipe/{{ $equipe->idequipe }}" method="GET" >
                                <button class="btnEditar">Editar</button>
                            </form>
                        </div>
                        <div class="containerClienteExcluir">
                            <form action="/deletar/equipe/{{ $equipe->idequipe }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btnExcluir">Excluir</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
