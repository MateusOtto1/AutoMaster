@extends('layouts.main')
@section('content')
    <div class="containerHomeAll">
        <div class="containerHome">
            <div>
                @if(session('msg'))
                    <div class="alert alert-success alertHome alert-dismissible fade show" role="alert">
                        {{ session('msg') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h1 class="bemVindo">Bem vindo ao AutoMaster!</h1>
                <h2 class="vejaTarefas">Veja as tarefas pendentes</h2>
            </div>
            <div class="containerTarefasPendentesAll">
                <div class="containerTarefasPendentes">
                    <div class="containerTarefa">

                    </div>
                    <div class="containerTarefa">

                    </div>
                    <div class="containerTarefa">

                    </div>
                    <div class="containerTarefa">

                    </div>
                    <div class="containerTarefa">

                    </div>
                    <div class="containerTarefa">

                    </div>
                </div>
            </div>
            <div class="vejaTarefasProntas">
                <h2>Veja as tarefas Prontas</h2>

                <div class="containerTarefasPendentesAll">
                    <div class="containerTarefasPendentes">
                        <div class="containerTarefa">

                        </div>
                        <div class="containerTarefa">

                        </div>
                        <div class="containerTarefa">

                        </div>
                        <div class="containerTarefa">

                        </div>
                        <div class="containerTarefa">

                        </div>
                        <div class="containerTarefa">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
