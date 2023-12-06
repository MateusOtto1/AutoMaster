<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\PecaController;
use App\Http\Controllers\MecanicoController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\OrdemServicoController;


Route::get('/', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/', [AdminController::class, 'login']);
Route::get('/envia/codigo', [AdminController::class, 'show']);
Route::put('/envia/codigo', [AdminController::class, 'sendCode']);
Route::get('/verifica/codigo', [AdminController::class, 'showCodeForm']);
Route::post('/verifica/codigo', [AdminController::class, 'verifyCode']);
Route::get('/altera/senha/{codigo}', [AdminController::class, 'showPasswordForm']);
Route::put('/altera/senha/{codigo}', [AdminController::class, 'changePassword']);

Route::middleware(['admin.auth'])->group(function () {

Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/cadastro/cliente', [ClienteController::class, 'index']);
Route::post('/cadastro/cliente', [ClienteController::class, 'store']);
Route::get('/listar/cliente', [ClienteController::class, 'showAll']);
Route::delete('/deletar/cliente/{idcliente}', [ClienteController::class, 'destroy']);
Route::get('/editar/cliente/{idcliente}', [ClienteController::class, 'edit']);
Route::put('/editar/cliente/{idcliente}', [ClienteController::class, 'update']);

Route::get('/cadastro/veiculo', [VeiculoController::class, 'index']);
Route::post('/cadastro/veiculo', [VeiculoController::class, 'store']);
Route::get('/listar/veiculo', [VeiculoController::class, 'showAll']);
Route::delete('/deletar/veiculo/{idveiculo}', [VeiculoController::class, 'destroy']);
Route::get('/editar/veiculo/{idveiculo}', [VeiculoController::class, 'edit']);
Route::put('/editar/veiculo/{idveiculo}', [VeiculoController::class, 'update']);

Route::get('/cadastro/peca', [PecaController::class, 'index']);
Route::post('/cadastro/peca', [PecaController::class, 'store']);
Route::get('/listar/peca', [PecaController::class, 'showAll']);
Route::delete('/deletar/peca/{idpeca}', [PecaController::class, 'destroy']);
Route::get('/editar/peca/{idpeca}', [PecaController::class, 'edit']);
Route::put('/editar/peca/{idpeca}', [PecaController::class, 'update']);

Route::get('/cadastro/mecanico', [MecanicoController::class, 'index']);
Route::post('/cadastro/mecanico', [MecanicoController::class, 'store']);
Route::get('/listar/mecanico', [MecanicoController::class, 'showAll']);
Route::delete('/deletar/mecanico/{idmecanico}', [MecanicoController::class, 'destroy']);
Route::get('/editar/mecanico/{idmecanico}', [MecanicoController::class, 'edit']);
Route::put('/editar/mecanico/{idmecanico}', [MecanicoController::class, 'update']);

Route::get('/cadastro/equipe', [EquipeController::class, 'index']);
Route::post('/cadastro/equipe', [EquipeController::class, 'store']);
Route::get('/listar/equipe', [EquipeController::class, 'showAll']);
Route::delete('/deletar/equipe/{idequipe}', [EquipeController::class, 'destroy']);
Route::get('/editar/equipe/{idequipe}', [EquipeController::class, 'edit']);
Route::put('/editar/equipe/{idequipe}', [EquipeController::class, 'update']);

Route::get('/cadastro/servico', [OrdemServicoController::class, 'index']);
Route::post('/cadastro/servico', [OrdemServicoController::class, 'store']);
Route::get('/home', [OrdemServicoController::class, 'showAll']);
Route::get('/listar/servico', [OrdemServicoController::class, 'show']);
Route::delete('/deletar/servico/{idordemServico}', [OrdemServicoController::class, 'destroy']);
Route::get('/editar/servico/{idordemServico}', [OrdemServicoController::class, 'edit']);
Route::put('/editar/servico/{idordemServico}', [OrdemServicoController::class, 'update']);

});
