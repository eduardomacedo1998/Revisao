<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllers;
use App\Http\Controllers\RevisaoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserControllers::class, 'index']);
Route::post('/login', [UserControllers::class, 'login']);
Route::post('/register', [UserControllers::class, 'register']);

// rota create revisao

Route::get('/revisoes/create', [RevisaoController::class, 'create'])->name('revisoes.create');

// rotas para Disciplinas
Route::get('/disciplinas/create', [RevisaoController::class, 'createDisciplina'])->name('disciplinas.create');
Route::post('/disciplinas', [RevisaoController::class, 'storeDisciplina'])->name('disciplinas.store');

// rotas para Revisao
Route::get('/revisoes/create', [RevisaoController::class, 'create'])->name('revisoes.create');
Route::get('/revisoes/filtro', [RevisaoController::class, 'filter'])->name('revisoes.filter');
Route::get('/revisoes', [RevisaoController::class, 'index'])->name('revisoes.index');
Route::post('/revisoes', [RevisaoController::class, 'store'])->name('revisoes.store');
Route::get('/revisoes/{id}', [RevisaoController::class, 'show']);
Route::put('/revisoes/{id}', [RevisaoController::class, 'update']);
Route::delete('/revisoes/{id}', [RevisaoController::class, 'destroy']);





// rotas protegidas por autenticação

Route::get('/home', [RevisaoController::class, 'home'])->name('home');
