@extends('layouts.main')
@section('content')
<div class="containerCadastrosAll">
    <div class="containerCadastroVeiculo">
        <h1 class="cadastro">Cadastro de Veículo</h1>
        <form action="/cadastro/veiculo" method="POST">
            @csrf
            <div class="containerInputEmailDono">
                <div class="form__group field">
                    <input type="email" name="email" class="form__field" placeholder="E-mail do dono" required="">
                    <label for="name" class="form__label">E-mail do dono</label>
                </div>
            </div>
            <div class="containerInput">
                <div class="form__group field">
                    <input type="text" name="modelo" class="form__field" placeholder="Modelo" required="">
                    <label for="name" class="form__label">Modelo</label>
                </div>
            </div>
            <div class="containerInput">
                <div class="form__group field">
                    <input type="text" name="cor" class="form__field" placeholder="Cor" required="">
                    <label for="name" class="form__label">Cor</label>
                </div>
            </div>
            <div class="containerInput">
                <div class="form__group field">
                    <input type="date" name="ano" class="form__field" placeholder="Ano" required="">
                    <label for="name" class="form__label">Ano</label>
                </div>
            </div>
            <div class="containerInput">
                <div class="form__group field">
                    <input type="text" name="placa" class="form__field" placeholder="Placa" required="">
                    <label for="name" class="form__label">Placa</label>
                </div>
            </div>
            <button class="btnCadastrar">Cadastrar</button>
        </form>
    </div>
</div>
@endsection
