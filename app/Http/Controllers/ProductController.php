<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Mostrar jugadores disponibles en el mercado.
     */
    public function index()
    {
        $listaDeProductos = Product::whereDoesntHave('owners')->get();

        return view('product.index', [
            'players' => $listaDeProductos
        ]);
    }

    /**
     * Mostrar formulario para crear un jugador.
     */
    public function create()
    {
        $categories = Category::all();

        return view('product.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Crear jugador.
     */
    public function store(ProductRequest $request)
    {
        Product::create($request->validated());

        return redirect()
            ->route('product.index')
            ->with('success', 'Jugador creado correctamente.');
    }

    /**
     * Mostrar ficha del jugador.
     */
    public function show($idProduct)
    {
        $producto = Product::findOrFail($idProduct);

        return view('product.show', [
            'player' => $producto
        ]);
    }

    /**
     * Comprar jugador.
     */
    public function buy($idProduct)
    {
        $producto = Product::findOrFail($idProduct);

        if ($producto->owners()->exists()) {
            return redirect()
                ->route('product.index')
                ->with('error', 'Este jugador ya fue comprado.');
        }

        auth()->user()->products()->attach($producto->id);

        return redirect()
            ->route('product.show', $producto->id)
            ->with('success', '¡Jugador comprado correctamente!');
    }

    /**
     * Vender jugador.
     */
    public function sell($idProduct)
    {
        $producto = Product::findOrFail($idProduct);

        $usuario = auth()->user();

        if (!$usuario->products()
            ->where('product_id', $producto->id)
            ->exists()) {

            return redirect()
                ->route('product.index')
                ->with('error', 'Este jugador no pertenece a tu plantilla.');
        }

        $usuario->products()->detach($producto->id);

        return redirect()
            ->route('product.index')
            ->with('success', '¡Jugador puesto nuevamente en venta!');
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
     * Actualizar jugador.
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
     * Eliminar jugador.
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