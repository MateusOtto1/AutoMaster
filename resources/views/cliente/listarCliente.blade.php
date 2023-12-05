@extends('layouts.main')
@section('content')
    <div class="containerListagens">
        <h1 class="listagem">Todos Clientes do AutoMaster</h1>
        <div class="containerListagemClientes">
            <div class="containerBg">
                @if ($clientes->isEmpty())
                    <h1 class="listagem">Não há clientes cadastrados</h1>
                @endif
                @foreach ($clientes as $cliente)
                    <div class="containerClienteAll">
                        <div class="containerClienteNome">
                            <h1>{{ $cliente->nome }}</h1>
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
                            <form action="/editar/cliente/{{ $cliente->id }}" method="PUT" >
                                <button class="btnEditar">Editar</button>
                            </form>
                        </div>
                        <div class="containerClienteExcluir">
                            <form action="/excluir/cliente/{{ $cliente->id }}" method="DELETE">
                                <button class="btnExcluir">Excluir</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
