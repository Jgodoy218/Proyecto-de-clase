<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::prefix('product')->controller(ProductController::class)->name('product.')->group(function () {

    // Mercado
    Route::get('/', 'index')->name('index');

    // Usuarios autenticados
    Route::middleware('auth')->group(function () {

        // Crear jugador
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');

        // Comprar jugador
        Route::post('/{idProduct}/buy', 'buy')->name('buy');

        // Vender jugador
        Route::post('/{idProduct}/sell', 'sell')->name('sell');
    });

    // Ver ficha del jugador
    Route::get('/{idProduct}', 'show')->name('show');
});

require __DIR__.'/auth.php';