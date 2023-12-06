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
            <h1 class="cadastro">Editar Equipe</h1>
            <div class="containerBg">
                <form action="/editar/equipe/{{ $equipe->idequipe }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="input" name="nome" class="form__field" placeholder="Nome da Equipe" required="" value="{{ $equipe->nome }}">
                            <label for="name" class="form__label">Nome da Equipe</label>
                        </div>
                    </div>
                    @foreach($mecanicos as $mecanico)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="mecanico[]" value="{{ $mecanico->idmecanico }}" {{ in_array($mecanico->idmecanico, $equipe->mecanicos->pluck('idmecanico')->toArray()) ? 'checked' : '' }}>
                            <label class="form-check-label" for="mecanico{{ $mecanico->idpeca }}">
                                {{ $mecanico->nome }}
                            </label>
                        </div>
                    @endforeach
                    <button class="btnCadastrar">Editar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
