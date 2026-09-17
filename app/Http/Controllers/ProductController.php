<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private function players(): array
    {
        return [
            1 => [
                'id' => 1,
                'name' => 'Diego Ferreira',
                'position' => 'DEL',
                'club' => 'Norte United',
                'nationality' => 'Brasil',
                'age' => 24,
                'height' => 182,
                'weight' => 76,
                'foot' => 'Derecha',
                'rating' => 91,
                'fee' => '€82M',
                'color' => '#7a1f1f',
                'description' => 'Delantero centro veloz y potente en el juego aéreo. Máximo goleador de su liga en las últimas dos temporadas.',
            ],

            2 => [
                'id' => 2,
                'name' => 'Anders Solheim',
                'position' => 'MED',
                'club' => 'Milano Rossa',
                'nationality' => 'Noruega',
                'age' => 27,
                'height' => 178,
                'weight' => 72,
                'foot' => 'Izquierda',
                'rating' => 88,
                'fee' => '€64M',
                'color' => '#16513a',
                'description' => 'Mediocampista creativo con gran visión de pase y llegada al área rival.',
            ],

            3 => [
                'id' => 3,
                'name' => 'Rasheed Adeyemi',
                'position' => 'DEF',
                'club' => 'Lagos FC',
                'nationality' => 'Nigeria',
                'age' => 22,
                'height' => 188,
                'weight' => 83,
                'foot' => 'Derecha',
                'rating' => 85,
                'fee' => '€38M',
                'color' => '#1f3f6b',
                'description' => 'Central dominante en el juego aéreo, salida de balón limpia y buena lectura defensiva.',
            ],

            4 => [
                'id' => 4,
                'name' => 'Tomasz Kowalski',
                'position' => 'POR',
                'club' => 'Varsovia CF',
                'nationality' => 'Polonia',
                'age' => 29,
                'height' => 194,
                'weight' => 88,
                'foot' => 'Derecha',
                'rating' => 87,
                'fee' => '€30M',
                'color' => '#6b5b1f',
                'description' => 'Portero con excelentes reflejos y gran capacidad de juego con los pies.',
            ],

            5 => [
                'id' => 5,
                'name' => 'Mateus Duarte',
                'position' => 'DEL',
                'club' => 'Belém SC',
                'nationality' => 'Portugal',
                'age' => 21,
                'height' => 175,
                'weight' => 68,
                'foot' => 'Izquierda',
                'rating' => 90,
                'fee' => '€110M',
                'color' => '#7a1f1f',
                'description' => 'Extremo desequilibrante, uno contra uno letal y gran definición con la pierna izquierda.',
            ],

            6 => [
                'id' => 6,
                'name' => 'Hugo Fernández',
                'position' => 'MED',
                'club' => 'Sevilla Blanca',
                'nationality' => 'España',
                'age' => 25,
                'height' => 180,
                'weight' => 74,
                'foot' => 'Derecha',
                'rating' => 86,
                'fee' => '€47M',
                'color' => '#16513a',
                'description' => 'Mediocentro box-to-box, gran resistencia física y recuperación de balones.',
            ],
        ];
    }

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
        return view('product.create');
    }

    /**
     * Guardar un nuevo producto.
     */
    public function store(ProductRequest $request)
    {
        $producto = Product::create($request->validated());

        return redirect()
            ->route('product.index')
            ->with('success', 'Producto creado correctamente.');
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
     * Mostrar formulario para editar un producto.
     */
    public function edit($idProduct)
    {
        $producto = Product::findOrFail($idProduct);

        return view('product.edit', [
            'producto' => $producto
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
            ->route('product.index')
            ->with('success', 'Producto actualizado correctamente.');
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
            ->with('success', 'Producto eliminado correctamente.');
    }
}