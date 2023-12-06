<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat;family=Poppins;family=Roboto" rel="stylesheet">

    <title>AutoMaster</title>
</head>

<body>
    <div class="containerAll">
        @if (session('msg'))
            <div class="alert alert-danger" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="containerLogin">
            <div class="login">
                <h2 class="automaster">AutoMaster</h2>
                <h1 class="facalogin">Faça seu login</h1>
            </div>
            <form method="POST" action="{{ route('admin.login') }}">
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
                        <input type="password" name="password" class="form__field" placeholder="Senha" required="">
                        <label for="name" class="form__label">Senha</label>
                    </div>
                </div>
                <button class="btn-Logar">Logar</button>
            </form>
            <div class="esqueceu-Senha">
                <a href="/enviaCodigo">Esqueceu a senha?</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>
