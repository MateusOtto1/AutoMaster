@extends('layouts.main')
@section('content')
    <div class="containerListagens">
        <h1 class="listagem">Todos Serviços do AutoMaster</h1>
        @if (session('msg'))
            <div class="alert alert-success alertHome alert-dismissible fade show" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="containerListagemClientes">
            <div class="containerBgListar">
                @if ($ordensServico->isEmpty())
                    <h1 class="listagem2">Não há serviços cadastrados</h1>
                @endif
                @foreach ($ordensServico as $ordemServico)
                    <div class="containerClienteAll">
                        <div class="containerClienteNome">
                            <h1 class="nomeCliente">Descrição: <p class="clienteNome">{{ $ordemServico->descricao }}</p>
                            </h1>
                        </div>
                        <div class="containerClienteTelefone">
                            <h1>{{ $veiculo }}</h1>
                        </div>
                        <div class="containerClienteTelefone">
                            <h1>{{ $cliente}}</h1>
                        </div>
                        <div class="containerClienteEmail">
                            <h1>{{ $equipe }}</h1>
                        </div>
                        <div class="containerClienteEndereco">
                            <h1>{{ $ordemServico->data_emissao }}</h1>
                        </div>
                        <div class="containerClienteEndereco">
                            <h1>{{ $ordemServico->data_conclusao }}</h1>
                        </div>
                        <div class="containerClienteEditar">
                            <form action="/editar/servico/{{ $ordemServico->idordem_servico }}" method="GET">
                                <button class="btnEditar">Editar</button>
                            </form>
                        </div>
                        <div class="containerClienteExcluir">
                            <form action="/deletar/servico/{{ $ordemServico->idordem_servico }}" method="POST">
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
