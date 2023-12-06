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
            <h1 class="cadastro">Cadastro de Peça</h1>
            <div class="containerBg">
                <form action="/cadastro/peca" method="POST">
                    @csrf
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="input" name="tipo_peca" class="form__field" placeholder="Nome da Peça" required="">
                            <label for="name" class="form__label">Nome da Peça</label>
                        </div>
                    </div>
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="number" name="preco" class="form__field" placeholder="Preço" required="">
                            <label for="name" class="form__label">Preço</label>
                        </div>
                    </div>
                    <button class="btnCadastrar">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
