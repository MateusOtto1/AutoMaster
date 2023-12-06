@extends('layouts.main')
@section('content')
    <div class="containerCadastrosAll">
        @if (session('msg'))
            <div class="alert alert-danger" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="containerCadastros">
            <h1 class="cadastro">Editar Peça</h1>
            <div class="containerBg">
                <form action="/editar/peca/{{ $peca->idpeca }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="input" name="tipo_peca" class="form__field" placeholder="Nome da Peça" required="" value="{{ $peca->tipo_peca }}">
                            <label for="name" class="form__label">Nome da Peça</label>
                        </div>
                    </div>
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="number" name="preco" class="form__field" placeholder="Preço" required="" value="{{ $peca->preco}}">
                            <label for="name" class="form__label">Preço</label>
                        </div>
                    </div>
                    <button class="btnCadastrar">Editar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
