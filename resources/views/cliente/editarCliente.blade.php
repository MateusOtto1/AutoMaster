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
            <h1 class="cadastro">Editar Cliente</h1>
            <div class="containerBg">
                <form action="/editar/cliente/{{ $cliente->idcliente }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="input" name="nome" class="form__field" placeholder="Nome" required="" value="{{ $cliente->nome }}">
                            <label for="name" class="form__label">Nome</label>
                        </div>
                    </div>
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="email" name="email" class="form__field" placeholder="E-mail" required="" value="{{ $cliente->email }}">
                            <label for="name" class="form__label">E-mail</label>
                        </div>
                    </div>
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="text" name="endereco" class="form__field" placeholder="Endereco" required="" value="{{ $cliente->endereco }}">
                            <label for="name" class="form__label">Endereco</label>
                        </div>
                    </div>
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="number" name="telefone" class="form__field" placeholder="Telefone" required="" value="{{ $cliente->telefone}}">
                            <label for="name" class="form__label">Telefone</label>
                        </div>
                    </div>
                    <button class="btnCadastrar">Editar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
