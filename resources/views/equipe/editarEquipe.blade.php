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
                    <div class="containerFlexCheck">
                        <h2 class="pecas">Mecânicos</h2>
                        <div class="containerCheck">
                            @foreach ($mecanicos as $mecanico)
                                <div class="containerEnvolveCheck">
                                    <label class="cyberpunk-checkbox-label" for="mecanico{{ $mecanico->idmecanico }}">
                                        <input type="checkbox" class="cyberpunk-checkbox" name="mecanico[]" value="{{ $mecanico->idmecanico }}" {{ in_array($mecanico->idmecanico, $equipe->mecanicos->pluck('idmecanico')->toArray()) ? 'checked' : '' }}>
                                        {{ $mecanico->nome }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button class="btnCadastrar">Editar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
