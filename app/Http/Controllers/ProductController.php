<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * "Base de datos" temporal en memoria, solo para poder mostrar el
     * mercado sin necesitar todavía una migración/tabla real.
     * Cuando tengas tu modelo Player + migración, reemplaza esto por
     * Player::all() / Player::findOrFail($id).
     */
    private function players(): array
    {
        return [
            1 => [
                'id' => 1, 'name' => 'Diego Ferreira', 'position' => 'DEL',
                'club' => 'Norte United', 'nationality' => 'Brasil',
                'age' => 24, 'height' => 182, 'weight' => 76,
                'foot' => 'Derecha', 'rating' => 91, 'fee' => '€82M',
                'color' => '#7a1f1f',
                'description' => 'Delantero centro veloz y potente en el juego aéreo. Máximo goleador de su liga en las últimas dos temporadas.',
            ],
            2 => [
                'id' => 2, 'name' => 'Anders Solheim', 'position' => 'MED',
                'club' => 'Milano Rossa', 'nationality' => 'Noruega',
                'age' => 27, 'height' => 178, 'weight' => 72,
                'foot' => 'Izquierda', 'rating' => 88, 'fee' => '€64M',
                'color' => '#16513a',
                'description' => 'Mediocampista creativo con gran visión de pase y llegada al área rival.',
            ],
            3 => [
                'id' => 3, 'name' => 'Rasheed Adeyemi', 'position' => 'DEF',
                'club' => 'Lagos FC', 'nationality' => 'Nigeria',
                'age' => 22, 'height' => 188, 'weight' => 83,
                'foot' => 'Derecha', 'rating' => 85, 'fee' => '€38M',
                'color' => '#1f3f6b',
                'description' => 'Central dominante en el juego aéreo, salida de balón limpia y buena lectura defensiva.',
            ],
            4 => [
                'id' => 4, 'name' => 'Tomasz Kowalski', 'position' => 'POR',
                'club' => 'Varsovia CF', 'nationality' => 'Polonia',
                'age' => 29, 'height' => 194, 'weight' => 88,
                'foot' => 'Derecha', 'rating' => 87, 'fee' => '€30M',
                'color' => '#6b5b1f',
                'description' => 'Portero con excelentes reflejos y gran capacidad de juego con los pies.',
            ],
            5 => [
                'id' => 5, 'name' => 'Mateus Duarte', 'position' => 'DEL',
                'club' => 'Belém SC', 'nationality' => 'Portugal',
                'age' => 21, 'height' => 175, 'weight' => 68,
                'foot' => 'Izquierda', 'rating' => 90, 'fee' => '€110M',
                'color' => '#7a1f1f',
                'description' => 'Extremo desequilibrante, uno contra uno letal y gran definición con la pierna izquierda.',
            ],
            6 => [
                'id' => 6, 'name' => 'Hugo Fernández', 'position' => 'MED',
                'club' => 'Sevilla Blanca', 'nationality' => 'España',
                'age' => 25, 'height' => 180, 'weight' => 74,
                'foot' => 'Derecha', 'rating' => 86, 'fee' => '€47M',
                'color' => '#16513a',
                'description' => 'Mediocentro box-to-box, gran resistencia física y recuperación de balones.',
            ],
        ];
    }

    public function index()
    {
        $players = $this->players();

        return view('product.index', compact('players'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function show($idProduct)
    {
        $players = $this->players();
        $player = $players[$idProduct] ?? null;

        abort_if(is_null($player), 404, 'Jugador no encontrado');

        return view('product.show', compact('player'));
    }
}