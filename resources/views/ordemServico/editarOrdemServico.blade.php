@extends('layouts.main')
@section('content')
    <div class="containerCadastrosAll">
        <div class="containerCadastroServico">
            @if (session('msg'))
                <div class="alert alertVeiculo alert-danger" role="alert">
                    {{ session('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h1 class="ordem">Editar Ordem de Serviço</h1>
            <form action="/editar/servico/{{ $ordemServico->idordem_servico }}" method="POST">
                @csrf
                @method('PUT')
                <div class="containerFlexServico">
                    <div class="containerInputServico">
                        <div class="form__group field">
                            <input type="text" name="descricao" class="form__field" placeholder="Descrição"
                                required="" value="{{ $ordemServico->descricao }}">
                            <label for="name" class="form__label">Descrição</label>
                        </div>
                    </div>
                    <div class="containerInputServico">
                        <div class="form__group field">
                            <input type="email" name="email" class="form__field" placeholder="E-mail do Cliente"
                                required="" value="{{ $cliente }}">
                            <label for="name" class="form__label">E-mail do cliente</label>
                        </div>
                    </div>
                </div>
                <div class="containerFlexServico">
                    <div class="containerInputServico">
                        <div class="form__group field">
                            <input type="date" name="data_emissao" class="form__field" placeholder="Data da Emissão"
                                required="" value="{{ $ordemServico->data_emissao }}">
                            <label for="name" class="form__label">Data da Emissão</label>
                        </div>
                    </div>
                    <div class="containerInputServico">
                        <div class="form__group field">
                            <input type="date" name="data_conclusao" class="form__field" placeholder="Data da Conclusão"
                                required="" value="{{ $ordemServico->data_conclusao }}">
                            <label for="name" class="form__label">Data da Conclusão</label>
                        </div>
                    </div>
                </div>
                <div class="containerFlexServico">
                    <div class="containerInputServico">
                        <div class="form__group field">
                            <input type="text" name="placa" class="form__field" placeholder="Placa" required=""
                                value="{{ $veiculo }}">
                            <label for="name" class="form__label">Placa</label>
                        </div>
                    </div>
                    <div class="containerInputServico">
                        <div class="form__group field">
                            <input type="text" name="nome_equipe" class="form__field" placeholder="Nome da Equipe"
                                required="" value="{{ $equipe }}">
                            <label for="name" class="form__label">Nome da Equipe</label>
                        </div>
                    </div>
                </div>
                <div class="containerFlexCheck">
                    <h2 class="pecas">Peças</h2>
                    <div class="containerCheck">
                        @foreach ($pecas as $peca)
                            <div class="containerEnvolveCheck">
                                <label class="cyberpunk-checkbox-label" for="peca{{ $peca->idpeca }}">
                                    <input type="checkbox" class="cyberpunk-checkbox" name="peca[]"
                                        value="{{ $peca->idpeca }}"
                                        {{ in_array($peca->idpeca, $ordemServico->pecas->pluck('idpeca')->toArray()) ? 'checked' : '' }}>
                                    {{ $peca->tipo_peca }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="containerInput">
                    <div class="form__group field">
                        <input type="number" name="valor" class="form__field" placeholder="Valor do Serviço"
                            required="" value="{{ $valorTotalOrdemServico }}">
                        <label for="name" class="form__label">Valor do Serviço</label>
                    </div>
                </div>
                <button class="btnCadastrar">Editar</button>
            </form>
        </div>
    </div>
@endsection
