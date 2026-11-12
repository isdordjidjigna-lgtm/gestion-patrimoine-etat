<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return redirect('/api/auth/login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return '<h1>Bienvenue sur le tableau de bord !</h1><p>Vous êtes connecté.</p><a href="/api/auth/logout">Se déconnecter</a>';
})->middleware('auth');