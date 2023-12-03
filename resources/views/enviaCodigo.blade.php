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
            <div class="enviaCodigo">
                <div class="login">
                    <h2 class="automaster">AutoMaster</h2>
                    <h1 class="facalogin">Enviar código de verificação</h1>
                </div>
                <form action="/esqueceuSenha" method="POST">
                    <button class="btnLogar">Enviar</button>
                </form>
                <button class="btnLogar">
                    <a href="/">Voltar</a>
                </button>
            </div>
        </div>
    </div>
</body>

</html>
