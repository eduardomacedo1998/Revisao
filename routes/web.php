<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllers;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserControllers::class, 'index']);
Route::post('/login', [UserControllers::class, 'login']);
Route::post('/register', [UserControllers::class, 'register']);
