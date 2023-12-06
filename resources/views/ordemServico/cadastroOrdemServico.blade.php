@extends('layouts.main')
@section('content')
    <div class="containerCadastrosAll">
        @if (session('msg'))
            <div class="alert alertVeiculo alert-danger" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="containerCadastros">
            <h1 class="cadastro">Ordem de Serviço</h1>
            <form action="/cadastro/servico" method="POST">
                @csrf
                <div class="containerInput">
                    <div class="form__group field">
                        <input type="text" name="descricao" class="form__field" placeholder="Descrição" required="">
                        <label for="name" class="form__label">Descrição</label>
                    </div>
                </div>
                <div class="containerInput">
                    <div class="form__group field">
                        <input type="date" name="data_emissao" class="form__field" placeholder="Data da Emissão"
                            required="">
                        <label for="name" class="form__label">Data da Emissão</label>
                    </div>
                </div>
                <div class="containerInput">
                    <div class="form__group field">
                        <input type="date" name="data_conclusao" class="form__field" placeholder="Data da Conclusão"
                            required="">
                        <label for="name" class="form__label">Data da Conclusão</label>
                    </div>
                </div>
                <div class="containerInput">
                    <div class="form__group field">
                        <input type="email" name="email" class="form__field" placeholder="E-mail do Cliente"
                            required="">
                        <label for="name" class="form__label">E-mail do cliente</label>
                    </div>
                </div>
                <div class="containerInput">
                    <div class="form__group field">
                        <input type="text" name="placa" class="form__field" placeholder="Placa" required="">
                        <label for="name" class="form__label">Placa</label>
                    </div>
                </div>
                <div class="containerInput">
                    <div class="form__group field">
                        <input type="text" name="nome_equipe" class="form__field" placeholder="Nome da Equipe" required="">
                        <label for="name" class="form__label">Nome da Equipe</label>
                    </div>
                </div>
                <div class="containerInput">
                    <div class="form__group field">
                        <h3>Pecas:</h3>
                        @foreach ($pecas as $peca)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="peca[]" value="{{ $peca->idpeca }}">
                                <label class="form-check-label" for="peca{{ $peca->idpeca }}">
                                    {{ $peca->tipo_peca }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="containerInput">
                    <div class="form__group field">
                        <input type="number" name="valor" class="form__field" placeholder="Valor do Serviço" required="">
                        <label for="name" class="form__label">Valor do Serviço</label>
                    </div>
                </div>
                <button class="btnCadastrar">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection
