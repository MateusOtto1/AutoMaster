<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;


Route::get('/', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/', [AdminController::class, 'login']);
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

Route::get('/telaCadastroVeiculo', function () {
    return view('cadastroVeiculo');
});

Route::get('/telaCadastroPeca', function () {
    return view('cadastroPeca');
});

Route::get('/telaCadastroMecanico', function () {
    return view('cadastroMecanico');
});
