<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::prefix('product')
    ->controller(ProductController::class)
    ->name('product.')
    ->group(function () {

        // Listar productos
        Route::get('/', 'index')->name('index');

        // Formulario para crear
        Route::get('/create', 'create')->name('create');

        // Guardar nuevo producto
        Route::post('/', 'store')->name('store');

        // Formulario para editar
        Route::get('/{idProduct}/edit', 'edit')->name('edit');

        // Actualizar producto
        Route::put('/{idProduct}', 'update')->name('update');

        // Eliminar producto
        Route::delete('/{idProduct}', 'destroy')->name('destroy');

        // Ver detalle
        Route::get('/{idProduct}', 'show')->name('show');
    });

// Todo apuntando al mismo CSS ubicado en la carpeta public y se llama style.css