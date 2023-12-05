@extends('layouts.main')
@section('content')
    <div class="containerListagens">
        <h1 class="listagem">Todos Clientes do AutoMaster</h1>
        @if(session('msg'))
            <div class="alert alert-success alertHome alert-dismissible fade show" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="containerListagemClientes">
            <div class="containerBgListar">
                @if ($clientes->isEmpty())
                    <h1 class="listagem2">Não há clientes cadastrados</h1>
                @endif
                @foreach ($clientes as $cliente)
                    <div class="containerClienteAll">
                        <div class="containerClienteNome">
                            <h1 class="nomeCliente">Nome: <p class="clienteNome">{{ $cliente->nome }}</p></h1>
                        </div>
                        <div class="containerClienteEmail">
                            <h1>{{ $cliente->email }}</h1>
                        </div>
                        <div class="containerClienteEndereco">
                            <h1>{{ $cliente->endereco }}</h1>
                        </div>
                        <div class="containerClienteTelefone">
                            <h1>{{ $cliente->telefone }}</h1>
                        </div>
                        <div class="containerClienteEditar">
                            <form action="/editar/cliente/{{ $cliente->idcliente }}" method="GET" >
                                <button class="btnEditar">Editar</button>
                            </form>
                        </div>
                        <div class="containerClienteExcluir">
                            <form action="/deletar/cliente/{{ $cliente->idcliente }}" method="POST">
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
