<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat;family=Poppins;family=Roboto" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <title>AutoMaster</title>
</head>

<body>
    <div class="containerNavbar">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/home">AutoMaster</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/home">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Cadastros
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="/cadastro/cliente">Cadastrar Cliente</a></li>
                              <li><a class="dropdown-item" href="/cadastro/veiculo">Cadastrar Veículo</a></li>
                              <li><a class="dropdown-item" href="/cadastro/peca">Cadastrar Peça</a></li>
                              <li><a class="dropdown-item" href="/cadastro/mecanico">Cadastrar Mecânico</a></li>
                              <li><a class="dropdown-item" href="/cadastro/equipe">Cadastrar Equipe</a></li>
                            </ul>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Listagens
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="/listar/cliente">Listar Clientes</a></li>
                              <li><a class="dropdown-item" href="/listar/veiculo">Listar Veículos</a></li>
                              <li><a class="dropdown-item" href="/listar/peca">Listar Peças</a></li>
                              <li><a class="dropdown-item" href="/listar/mecanico">Listar Mecânicos</a></li>
                            </ul>
                          </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/cadastro/servico">Ordem de Serviço</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/listar/equipe">Gerenciar Equipes</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="GET">
                                <button class="nav-link">Deslogar</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
