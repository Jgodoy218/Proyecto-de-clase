<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);
Route::prefix('product')->controller(ProductController::class)->name('product.')->group(function () {
    Route::get('/', 'index')->name('index');            // muestre listado de produtos          -> /product
    Route::get('/create', 'create')->name('create');    // formulario para crear un producto     -> /product/create
    Route::get('/{idProduct}', 'show')->name('show');   // detalle de un producto                -> /product/{idProduct}
});

//Todo apuntando al mismo Css ubicado en la carpeta public y se llama style.css