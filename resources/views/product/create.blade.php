@extends('layouts.app')

@section('title', 'Fichar jugador')

@section('content')

    <section class="section container">
        <a href="{{ route('product.index') }}" class="back-link">&larr; Volver al mercado</a>

        <div class="section-head">
            <div>
                <span class="eyebrow">Nueva ficha</span>
                <h1>Fichar nuevo jugador</h1>
                <p>Completa el reporte de scouting. Estos datos formarán la ficha pública que verán los clubes interesados.</p>
            </div>
        </div>

        {{-- Nota: para que este formulario guarde datos de verdad hace falta
             agregar una ruta POST (Route::post('/product', 'store')) y un
             método store() en ProductController que valide y persista los datos. --}}
        <form class="scout-sheet" action="{{ url('/product') }}" method="POST">
            @csrf

            <div class="form-grid">
                <div class="field full">
                    <label for="name">Nombre completo</label>
                    <input type="text" id="name" name="name" placeholder="Ej: Diego Ferreira" required>
                </div>

                <div class="field">
                    <label for="position">Posición</label>
                    <select id="position" name="position" required>
                        <option value="">Selecciona...</option>
                        <option value="POR">Portero</option>
                        <option value="DEF">Defensa</option>
                        <option value="MED">Mediocampista</option>
                        <option value="DEL">Delantero</option>
                    </select>
                </div>

                <div class="field">
                    <label for="foot">Pierna hábil</label>
                    <select id="foot" name="foot" required>
                        <option value="">Selecciona...</option>
                        <option value="Derecha">Derecha</option>
                        <option value="Izquierda">Izquierda</option>
                        <option value="Ambidiestro">Ambidiestro</option>
                    </select>
                </div>

                <div class="field">
                    <label for="age">Edad</label>
                    <input type="number" id="age" name="age" min="15" max="45" placeholder="24" required>
                </div>

                <div class="field">
                    <label for="nationality">Nacionalidad</label>
                    <input type="text" id="nationality" name="nationality" placeholder="Ej: Brasil" required>
                </div>

                <div class="field">
                    <label for="height">Estatura (cm)</label>
                    <input type="number" id="height" name="height" min="140" max="220" placeholder="182" required>
                </div>

                <div class="field">
                    <label for="weight">Peso (kg)</label>
                    <input type="number" id="weight" name="weight" min="45" max="120" placeholder="76" required>
                </div>

                <div class="field">
                    <label for="club">Club actual</label>
                    <input type="text" id="club" name="club" placeholder="Ej: Norte United" required>
                </div>

                <div class="field">
                    <label for="price">Precio de traspaso (€)</label>
                    <input type="number" id="price" name="price" min="0" step="100000" placeholder="45000000" required>
                </div>

                <div class="field full">
                    <label for="image">URL de la imagen / foto del jugador</label>
                    <input type="url" id="image" name="image" placeholder="https://...">
                </div>

                <div class="field full">
                    <label for="description">Descripción / reporte de scouting</label>
                    <textarea id="description" name="description" placeholder="Características técnicas, fortalezas, historial de clubes..."></textarea>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-gold">Publicar ficha</button>
                <span class="form-hint">Los campos marcados son obligatorios.</span>
            </div>
        </form>
    </section>

@endsection