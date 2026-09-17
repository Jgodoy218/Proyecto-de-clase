<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $listaDeProductos = Product::all();

        return view('product.index', [
            'players' => $listaDeProductos
        ]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(ProductRequest $request)
    {
        Product::create($request->validated());

        return redirect()
            ->route('product.index')
            ->with('success', 'Jugador creado correctamente.');
    }

    public function show($idProduct)
    {
        $producto = Product::findOrFail($idProduct);

        return view('product.show', [
            'producto' => $producto
        ]);
    }

    public function edit($idProduct)
    {
        $producto = Product::findOrFail($idProduct);

        return view('product.edit', [
            'producto' => $producto
        ]);
    }

    public function update(ProductRequest $request, $idProduct)
    {
        $producto = Product::findOrFail($idProduct);

        $producto->update($request->validated());

        return redirect()
            ->route('product.show', $producto->id)
            ->with('success', 'Jugador actualizado correctamente.');
    }

    public function destroy($idProduct)
    {
        $producto = Product::findOrFail($idProduct);

        $producto->delete();

        return redirect()
            ->route('product.index')
            ->with('success', 'Jugador eliminado correctamente.');
    }
}