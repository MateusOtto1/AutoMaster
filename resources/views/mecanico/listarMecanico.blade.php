@extends('layouts.main')
@section('content')
    <div class="containerListagens">
        <h1 class="listagem">Todos Mecânicos do AutoMaster</h1>
        @if(session('msg'))
            <div class="alert alert-success alertHome alert-dismissible fade show" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="containerListagemClientes">
            <div class="containerBgListar">
                @if ($mecanicos->isEmpty())
                    <h1 class="listagem2">Não há mecânicos cadastrados</h1>
                @endif
                @foreach ($mecanicos as $mecanico)
                    <div class="containerClienteAll">
                        <div class="containerClienteNome">
                            <h1 class="nomeCliente">Nome: <p class="clienteNome">{{ $mecanico->nome }}</p></h1>
                        </div>
                        <div class="containerClienteEndereco">
                            <h1>{{ $mecanico->especialidade }}</h1>
                        </div>
                        <div class="containerClienteEmail">
                            <h1>{{ $mecanico->email }}</h1>
                        </div>
                        <div class="containerClienteEditar">
                            <form action="/editar/mecanico/{{ $mecanico->idmecanico }}" method="GET" >
                                <button class="btnEditar">Editar</button>
                            </form>
                        </div>
                        <div class="containerClienteExcluir">
                            <form action="/deletar/mecanico/{{ $mecanico->idmecanico }}" method="POST">
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
