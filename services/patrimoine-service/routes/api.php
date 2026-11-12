<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BienController;
use App\Http\Controllers\Api\CategorieController;
use App\Http\Controllers\Api\MouvementController;

Route::prefix('patrimoine')->group(function () {
    // Biens
    Route::get('/biens', [BienController::class, 'index']);
    Route::post('/biens', [BienController::class, 'store']);
    Route::get('/biens/{id}', [BienController::class, 'show']);
    Route::put('/biens/{id}', [BienController::class, 'update']);
    Route::delete('/biens/{id}', [BienController::class, 'destroy']);

    // Catégories
    Route::get('/categories', [CategorieController::class, 'index']);
    Route::get('/categories/{id}', [CategorieController::class, 'show']);

    // Mouvements
    Route::get('/mouvements', [MouvementController::class, 'index']);
    Route::get('/mouvements/{id}', [MouvementController::class, 'show']);
});
