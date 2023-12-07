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
            <h1 id="loading">Carregando</h1>
            <div class="containerSpinnerAll">
                <div class="containerSpinner">
                    <div class="spinner"></div>
                </div>
            </div>
            <div class="someAll">
                <h1 class="cadastro">Editar Veículo</h1>
                <div class="containerBg">
                    <form action="/editar/veiculo/{{ $veiculo->idveiculo }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="containerInputEmailDono">
                            <div class="form__group field">
                                <input type="email" name="email" class="form__field" placeholder="E-mail do dono"
                                    required="" value="{{ $cliente->email }}">
                                <label for="name" class="form__label">E-mail do dono</label>
                            </div>
                        </div>
                        <div class="containerInput">
                            <div class="form__group field">
                                <input type="text" name="modelo" class="form__field" placeholder="Modelo" required=""
                                    value="{{ $veiculo->modelo }}">
                                <label for="name" class="form__label">Modelo</label>
                            </div>
                        </div>
                        <div class="containerInput">
                            <div class="form__group field">
                                <input type="text" name="cor" class="form__field" placeholder="Cor" required=""
                                    value="{{ $veiculo->cor }}">
                                <label for="name" class="form__label">Cor</label>
                            </div>
                        </div>
                        <div class="containerInput">
                            <div class="form__group field">
                                <input type="date" name="ano" class="form__field" placeholder="Ano" required=""
                                    value="{{ $veiculo->ano }}">
                                <label for="name" class="form__label">Ano</label>
                            </div>
                        </div>
                        <div class="containerInput">
                            <div class="form__group field">
                                <input type="text" name="placa" class="form__field" placeholder="Placa" required=""
                                    value="{{ $veiculo->placa }}">
                                <label for="name" class="form__label">Placa</label>
                            </div>
                        </div>
                        <button class="btnCadastrar" onclick="carregar()">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function carregar() {
            // Exibe o elemento de carregamento
            document.getElementById('loading').style.display = 'block';
            document.querySelector('.containerSpinnerAll').style.display = 'block';
            document.querySelector('.someAll').style.display = 'none';
            // Execute aqui suas operações assíncronas ou o que desejar

            // Simulando uma operação assíncrona com setTimeout
            setTimeout(function() {
                // Oculta o elemento de carregamento após um tempo
                document.getElementById('loading').style.display = 'none';
                document.querySelector('.containerSpinnerAll').style.display = 'none';
                document.querySelector('.someAll').style.display = 'block';
            }, 10000); // Tempo em milissegundos, ajuste conforme necessário
        }
    </script>
@endsection
