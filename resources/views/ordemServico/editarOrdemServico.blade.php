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
            <h1 class="cadastro">Editar Ordem de Serviço</h1>
            <div class="containerBg">
                <form action="/editar/servico/{{ $ordemServico->idordem_servico }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="text" name="descricao" class="form__field" placeholder="Descrição" required="" value="{{ $ordemServico->descricao }}">
                            <label for="name" class="form__label">Descrição</label>
                        </div>
                    </div>
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="date" name="data_emissao" class="form__field" placeholder="Data da Emissão"
                                required="" value="{{ $ordemServico->data_emissao }}">
                            <label for="name" class="form__label">Data da Emissão</label>
                        </div>
                    </div>
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="date" name="data_conclusao" class="form__field" placeholder="Data da Conclusão"
                                required="" value="{{ $ordemServico->data_conclusao }}">
                            <label for="name" class="form__label">Data da Conclusão</label>
                        </div>
                    </div>
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="email" name="email" class="form__field" placeholder="E-mail do Cliente"
                                required="" value="{{ $cliente }}">
                            <label for="name" class="form__label">E-mail do cliente</label>
                        </div>
                    </div>
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="text" name="placa" class="form__field" placeholder="Placa" required="" value="{{ $veiculo }}">
                            <label for="name" class="form__label">Placa</label>
                        </div>
                    </div>
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="text" name="nome_equipe" class="form__field" placeholder="Nome da Equipe" required="" value="{{ $equipe }}">
                            <label for="name" class="form__label">Nome da Equipe</label>
                        </div>
                    </div>
                    @foreach($pecas as $peca)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="peca[]" value="{{ $peca->idpeca }}" {{ in_array($peca->idpeca, $ordemServico->pecas->pluck('idpeca')->toArray()) ? 'checked' : '' }}>
                            <label class="form-check-label" for="peca{{ $peca->idpeca }}">
                                {{ $peca->tipo_peca }}
                            </label>
                        </div>
                    @endforeach
                    <div class="containerInput">
                        <div class="form__group field">
                            <input type="number" name="valor" class="form__field" placeholder="Valor do Serviço" required="" value="{{ $ordemServico->valor }}">
                            <label for="name" class="form__label">Valor do Serviço</label>
                        </div>
                    </div>
                    <button class="btnCadastrar">Editar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
