<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnvioController;
use App\Http\Controllers\UserController; // ← punto y coma agregado

Route::get('/', fn() => redirect()->route('envios.index'));

Route::middleware(['auth'])->group(function () {
    Route::resource('envios', EnvioController::class);

    Route::get('envios/{envio}/print', [EnvioController::class, 'print'])
        ->middleware('role:admin|cajero')
        ->name('envios.print');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';
