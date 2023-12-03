<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('login');
});

Route::get('/enviaCodigo', function () {
    return view('enviaCodigo');
});

Route::get('/esqueceuSenha', function () {
    return view('esqueceuSenha');
});

Route::get('/login', [LoginController::class, 'verificaLogin']);

Route::get('/home', function () {
    return view('home');
});

Route::get('/telaCadastroCliente', function () {
    return view('cadastroCliente');
});

Route::get('/telaCadastroVeiculo', function () {
    return view('cadastroVeiculo');
});

Route::get('/telaCadastroPeca', function () {
    return view('cadastroPeca');
});

Route::get('/telaCadastroMecanico', function () {
    return view('cadastroMecanico');
});
