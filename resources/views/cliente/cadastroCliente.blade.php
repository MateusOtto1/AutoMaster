@extends('layouts.main')
@section('content')
    <div class="containerCadastrosAll">
        @if (session('msg'))
            <div class="alert alert-danger" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="containerCadastroCliente">
            <h1 class="cadastro">Cadastro de Cliente</h1>
            <div class="containerBg">
                <form action="/cadastro/cliente" method="POST">
                    @csrf
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="input" name="nome" class="form__field" placeholder="Nome" required="">
                            <label for="name" class="form__label">Nome</label>
                        </div>
                    </div>
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="email" name="email" class="form__field" placeholder="E-mail" required="">
                            <label for="name" class="form__label">E-mail</label>
                        </div>
                    </div>
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="text" name="endereco" class="form__field" placeholder="Endereco" required="">
                            <label for="name" class="form__label">Endereco</label>
                        </div>
                    </div>
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="number" name="telefone" class="form__field" placeholder="Telefone" required="">
                            <label for="name" class="form__label">Telefone</label>
                        </div>
                    </div>
                    <button class="btnCadastrar">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
