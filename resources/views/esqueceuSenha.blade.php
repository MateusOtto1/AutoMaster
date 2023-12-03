<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat;family=Poppins;family=Roboto" rel="stylesheet">
    <title>AutoMaster</title>
</head>

<body>
    <div class="containerAll">
        <div class="container">
            <div class="login">
                <h2 class="automaster">AutoMaster</h2>
                <h1 class="facalogin">Insira o código</h1>
            </div>
            <form action="">
                <div class="containerInput">
                    <div class="form__group field">
                        <input type="input" class="form__field" name="codigo" placeholder="Código" required="">
                        <label for="name" class="form__label">Código</label>
                    </div>
                </div>
                <button class="btnLogar">Próximo</button>
            </form>
            <div class="esqueceuSenha">
                <a href="/">Voltar</a>
            </div>
        </div>
    </div>
</body>

</html>
