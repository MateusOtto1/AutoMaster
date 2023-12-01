<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AutoMaster</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>

<body>
    <div class="containerAll">
        <div class="container">
            <div class="login">
                <h2 class="automaster">AutoMaster</h2>
                <h1 class="facalogin">Faça seu login</h1>
            </div>
            <form action="">
                <div class="containerInputEmail">
                    <div class="form__group field">
                        <input type="input" class="form__field" placeholder="E-mail" required="">
                        <label for="name" class="form__label">E-mail</label>
                    </div>
                </div>
                <div class="containerInputSenha">
                    <div class="form__group field">
                        <input type="password" class="form__field" placeholder="Senha" required="">
                        <label for="name" class="form__label">Senha</label>
                    </div>
                </div>
                <button class="btnLogar">Logar</button>
            </form>
        </div>
    </div>
</body>

</html>
