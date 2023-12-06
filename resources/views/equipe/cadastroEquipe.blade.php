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
            <h1 class="cadastro">Cadastro de Equipe</h1>
            <div class="containerBg">
                <form action="/cadastro/equipe" method="POST">
                    @csrf
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="input" name="nome" class="form__field" placeholder="Nome da Equipe" required="">
                            <label for="name" class="form__label">Nome da Equipe</label>
                        </div>
                    </div>
                    <div class="containerCheks">
                        @foreach($mecanicos as $mecanico)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="mecanico[]" value="{{ $mecanico->idmecanico }}">
                                <label class="form-check-label" for="mecanico{{ $mecanico->idmecanico }}">
                                    <h2>{{ $mecanico->nome }}</h2>
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <button class="btnCadastrar">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
