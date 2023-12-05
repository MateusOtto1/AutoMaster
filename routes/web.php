<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VeiculoController;

Route::get('/', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/', [AdminController::class, 'login']);

Route::middleware(['admin.auth'])->group(function () {

Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/enviaCodigo', function () {
    return view('enviaCodigo');
});
Route::get('/esqueceuSenha', function () {
    return view('esqueceuSenha');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/cadastro/cliente', [ClienteController::class, 'index']);
Route::post('/cadastro/cliente', [ClienteController::class, 'store']);
Route::get('/listar/cliente', [ClienteController::class, 'showAll']);
Route::get('/editar/cliente/{id}', [ClienteController::class, 'show']);
Route::delete('/deletar/cliente/{id}', [ClienteController::class, 'destroy']);

Route::get('/cadastro/veiculo', [VeiculoController::class, 'index']);
Route::post('/cadastro/veiculo', [VeiculoController::class, 'store']);
Route::get('/telaCadastroPeca', function () {
    return view('cadastroPeca');
});

Route::get('/telaCadastroMecanico', function () {
    return view('cadastroMecanico');
});

});
