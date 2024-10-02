<?php

use App\Http\Controllers\FeriasController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\RecrutamentoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('sair', function () {
    Auth::logout();
    return view('auth.login');
})->name('sair');
Route::group(['middleware' => "auth"], function () {
    Route::get('/', function () {
        $nome = 77;
        //return view('page.inicio',['nome'=>$nome]);
        return view('page.inicio', compact('nome'));
    });
    //Rotas para Usuario
    Route::get('user', [UserController::class, 'index'])->name('usuario');
    Route::post('user', [UserController::class, 'store'])->name('user.cadastrar');
    Route::get('delete/{id}', [UserController::class, 'deletar'])->name('user.apagar');
    //Rotas para funcionário
    Route::get('funcioanrio', [FuncionarioController::class, 'index'])->name('funcionario');
    Route::post('funcioanrio', [FuncionarioController::class, 'store'])->name('funcionario.cadastrar');
    Route::get('delete/{id}/funcionario', [FuncionarioController::class, 'deletar'])->name('funcionario.apagar');
    //Rotas para recrutamento
    Route::get('recrutamento', [RecrutamentoController::class, 'index'])->name('recrutamento');
    Route::post('recrutamento', [RecrutamentoController::class, 'store'])->name('recrutamento.cadastrar');
    Route::get('delete/{id}/recrutamento', [RecrutamentoController::class, 'deletar'])->name('recrutamento.apagar');

    //Rotas para Férias
    Route::get('ferias', [FeriasController::class, 'index'])->name('ferias');
    Route::post('ferias', [FeriasController::class, 'store'])->name('ferias.cadastrar');
    Route::get('aprovado/{id}', [FeriasController::class, 'aprovar'])->name('ferias.apovar');
    Route::get('recusar/{id}', [FeriasController::class, 'recusar'])->name('ferias.recusar');
    Route::get('delete/{id}/ferias', [FeriasController::class,'deletar'])->name('ferias.apagar');

});

Auth::routes();

Route::get('/home', action: function () {
    return redirect(to: '/');
})->name('home');
