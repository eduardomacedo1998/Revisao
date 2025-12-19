<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllers;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserControllers::class, 'index']);
Route::post('/login', [UserControllers::class, 'login']);
Route::post('/register', [UserControllers::class, 'register']);


// rotas protegidas por autenticação

function authMiddleware($request, $next)
{
    if (!session()->has('user')) {
        return redirect('/')->with('error', 'Please log in to access this page.');
    }
    return $next($request);
}

Route::middleware('authMiddleware')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});