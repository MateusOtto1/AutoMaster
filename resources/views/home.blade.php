@extends('layouts.main')
@section('content')
    <div class="containerHomeAll">
        <div class="containerBanner">
            <div class="containerBgBanner">
                <div class="containerTexts">
                    <h1 class="banner">AutoMaster</h1>
                    <h3 class="textHome">Somos uma mecânica especializada em manutenção e reparo de veículos.
                        Oferecemos serviços completos para todos os tipos de carros, desde veículos nacionais a importados.
                    </h3>
                    @if (session('msg'))
                        <div class="alert alert-success alertHome alert-dismissible fade show" role="alert">
                            {{ session('msg') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="containerInfoAll">
            <div class="containerTarefas">
                <h1 class="tarefas"> Aqui estão seus serviços</h1>
            </div>
            <div class="containerServicos">
                @if ($ordensServico->isEmpty())
                    <h1 class="listagem2">Não há serviços cadastrados</h1>
                @endif
                @foreach ($ordensServico as $ordemServico)
                    <div class="containerServicoInfo">
                        <div class="containerInfo">
                            <h1 class="infoServico">Serviço: <p class="info">{{ $ordemServico->idordem_servico }}</p>
                            </h1>
                        </div>
                        <div class="containerInfo">
                            <h1 class="infoServico">Descrição: <p class="info">{{ $ordemServico->descricao }}</p>
                            </h1>
                        </div>
                        <div class="containerInfo">
                            <h1 class="infoServico">Veículo: <p class="info">{{ $veiculo }}</p>
                            </h1>
                        </div>
                        <div class="containerInfo">
                            <h1 class="infoServico">Cliente: <p class="info">{{ $cliente }}</p>
                            </h1>
                        </div>
                        <div class="containerInfo">
                            <h1 class="infoServico">Equipe: <p class="info">{{ $equipe }}</p>
                            </h1>
                        </div>
                        <div class="containerInfo">
                            <h1 class="infoServico">Data de Emissão: <p class="info">{{ $ordemServico->data_emissao }}</p>
                            </h1>
                        </div>
                        <div class="containerInfo">
                            <h1 class="infoServico">Data de Conclusão: <p class="info">{{ $ordemServico->data_conclusao }}
                                </p>
                            </h1>
                        </div>
                        <div class="containerInfo">
                            <h1 class="infoServico">Valor Total: <p class="info">{{ $ordemServico->valor }}</p>
                            </h1>
                        </div>
                        <div class="containerBtn">
                            <form action="/editar/servico/{{ $ordemServico->idordem_servico }}" method="GET">
                                <button class="btnEditar">
                                    <span>Editar</span>
                                    <span>
                                        <svg class="edit-svgIcon" viewBox="0 0 512 512">
                                            <path
                                                d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z">
                                            </path>
                                        </svg>
                                    </span>
                                </button>
                            </form>
                            <form action="/deletar/servico/{{ $ordemServico->idordem_servico }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btnDeletar">
                                    <span>Deletar</span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-miterlimit="2"
                                            stroke-linejoin="round" fill-rule="evenodd" clip-rule="evenodd">
                                            <path fill-rule="nonzero"
                                                d="m12.002 2.005c5.518 0 9.998 4.48 9.998 9.997 0 5.518-4.48 9.998-9.998 9.998-5.517 0-9.997-4.48-9.997-9.998 0-5.517 4.48-9.997 9.997-9.997zm0 1.5c-4.69 0-8.497 3.807-8.497 8.497s3.807 8.498 8.497 8.498 8.498-3.808 8.498-8.498-3.808-8.497-8.498-8.497zm0 7.425 2.717-2.718c.146-.146.339-.219.531-.219.404 0 .75.325.75.75 0 .193-.073.384-.219.531l-2.717 2.717 2.727 2.728c.147.147.22.339.22.531 0 .427-.349.75-.75.75-.192 0-.384-.073-.53-.219l-2.729-2.728-2.728 2.728c-.146.146-.338.219-.53.219-.401 0-.751-.323-.751-.75 0-.192.073-.384.22-.531l2.728-2.728-2.722-2.722c-.146-.147-.219-.338-.219-.531 0-.425.346-.749.75-.749.192 0 .385.073.531.219z">
                                            </path>
                                        </svg>
                                    </span>
                                </button>
                            </form>
                        </div>
                        @if ($ordemServico->status == 0)
                            <div class="containerBtn">
                                <form action="/concluir/servico/{{ $ordemServico->idordem_servico }}" method="GET">
                                    <button class="btnConcluir">
                                        <span>Concluir Serviço</span>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
