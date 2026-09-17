<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Mostrar todos los productos.
     */
    public function index()
    {
        $listaDeProductos = Product::all();

        return view('product.index', [
            'players' => $listaDeProductos
        ]);
    }

    /**
     * Mostrar formulario para crear un producto.
     */
    public function create()
    {
        $categories = Category::all();

        return view('product.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Guardar un nuevo producto.
     */
    public function store(ProductRequest $request)
    {
        Product::create($request->validated());

        return redirect()
            ->route('product.index')
            ->with('success', 'Jugador creado correctamente.');
    }

    /**
     * Mostrar un producto específico.
     */
    public function show($idProduct)
    {
        $producto = Product::findOrFail($idProduct);

        return view('product.show', [
            'producto' => $producto
        ]);
    }

    /**
     * Mostrar formulario para editar.
     */
    public function edit($idProduct)
    {
        $producto = Product::findOrFail($idProduct);

        $categories = Category::all();

        return view('product.edit', [
            'producto' => $producto,
            'categories' => $categories
        ]);
    }

    /**
     * Actualizar un producto.
     */
    public function update(ProductRequest $request, $idProduct)
    {
        $producto = Product::findOrFail($idProduct);

        $producto->update($request->validated());

        return redirect()
            ->route('product.show', $producto->id)
            ->with('success', 'Jugador actualizado correctamente.');
    }

    /**
     * Eliminar un producto.
     */
    public function destroy($idProduct)
    {
        $producto = Product::findOrFail($idProduct);

        $producto->delete();

        return redirect()
            ->route('product.index')
            ->with('success', 'Jugador eliminado correctamente.');
    }
}