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

Route::get('/esqueceuSenha', function () {
    return view('esqueceuSenha');
});

Route::get('/login', [LoginController::class, 'verificaLogin']);

Route::get('/home', function () {
    return view('home');
});
