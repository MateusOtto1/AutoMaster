@extends('layouts.main')
@section('content')
    <div class="containerListagens">
        <h1 class="listagem">Todas Peças do AutoMaster</h1>
        @if(session('msg'))
            <div class="alert alert-success alertHome alert-dismissible fade show" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="containerListagemClientes">
            <div class="containerBgListar">
                @if ($pecas->isEmpty())
                    <h1 class="listagem2">Não há peças cadastradas</h1>
                @endif
                @foreach ($pecas as $peca)
                    <div class="containerClienteAll">
                        <div class="containerClienteNome">
                            <h1 class="nomeCliente">Peça: <p class="clienteNome">{{ $peca->tipo_peca }}</p></h1>
                        </div>
                        <div class="containerClienteTelefone">
                            <h1>{{ $peca->preco }}</h1>
                        </div>
                        <div class="containerClienteEditar">
                            <form action="/editar/peca/{{ $peca->idpeca }}" method="GET" >
                                <button class="btnEditar">Editar</button>
                            </form>
                        </div>
                        <div class="containerClienteExcluir">
                            <form action="/deletar/peca/{{ $peca->idpeca }}" method="POST">
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
