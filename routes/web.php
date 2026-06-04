<?php

use App\Http\Controllers\Market\CoiffeurController;
use App\Http\Controllers\Market\HomeController;
use Illuminate\Support\Facades\Route;



// ── PUBLIC ─────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('coiffeuses')->name('coiffeuses.')->group(function () {
    Route::get('/', [CoiffeurController::class, 'index'])->name('index');
    Route::get('/{city}', [CoiffeurController::class, 'byCity'])->name('city');
    Route::get('/{city}/{slug}', [CoiffeurController::class, 'show'])->name('show');
});
