<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/registre', [\App\Http\Controllers\RegistreController::class, 'index'])->middleware('auth');
Route::get('/biens/{id}', [AppHttpControllersRegistreController::class, 'show'])->middleware('auth');
Route::get('/biens/{id}', [\App\Http\Controllers\RegistreController::class, 'show'])->middleware('auth');

Route::get('/ajouter-bien', function () {
    return view('ajouter-bien');
})->middleware('auth');