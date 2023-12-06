@extends('layouts.main')
@section('content')
    <div class="containerListagens">
        <h1 class="listagem">Todos Veículos do AutoMaster</h1>
        @if (session('msg'))
            <div class="alert alert-success alertHome alert-dismissible fade show" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="containerListagemClientes">
            <div class="containerBgListar">
                @if ($veiculos->isEmpty())
                    <h1 class="listagem2">Não há veículos cadastrados</h1>
                @endif
                @foreach ($veiculos as $veiculo)
                    @foreach ($clientes as $cliente)
                        @if ($veiculo->cliente_idcliente == $cliente->idcliente)
                            <div class="containerClienteAll">
                                <div class="containerClienteNome">
                                    <h1 class="nomeCliente">Modelo: <p class="clienteNome">{{ $veiculo->modelo }}</p>
                                    </h1>
                                </div>
                                <div class="containerClienteTelefone">
                                    <h1>{{ $veiculo->placa }}</h1>
                                </div>
                                <div class="containerClienteTelefone">
                                    <h1>{{ $cliente->email }}</h1>
                                </div>
                                <div class="containerClienteEmail">
                                    <h1>{{ $veiculo->cor }}</h1>
                                </div>
                                <div class="containerClienteEndereco">
                                    <h1>{{ $veiculo->ano }}</h1>
                                </div>
                                <div class="containerClienteEditar">
                                    <form action="/editar/veiculo/{{ $veiculo->idveiculo }}" method="GET">
                                        <button class="btnEditar">Editar</button>
                                    </form>
                                </div>
                                <div class="containerClienteExcluir">
                                    <form action="/deletar/veiculo/{{ $veiculo->idveiculo }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btnExcluir">Excluir</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection
