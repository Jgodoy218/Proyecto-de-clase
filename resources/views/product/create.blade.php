@extends('layouts.app')

@section('title', 'Fichar jugador')

@section('content')

<section class="section container">

    <a href="{{ route('product.index') }}" class="back-link">
        &larr; Volver al mercado
    </a>

    <div class="section-head">
        <div>
            <span class="eyebrow">Nueva ficha</span>

            <h1>Fichar nuevo jugador</h1>

            <p>
                Completa el reporte de scouting. Estos datos formarán
                la ficha pública que verán los clubes interesados.
            </p>
        </div>
    </div>

    @if ($errors->any())
        <div class="error-box">
            <strong>Hay algunos errores:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        class="scout-sheet"
        action="{{ route('product.store') }}"
        method="POST"
    >

        @csrf

        <div class="form-grid">

            {{-- NOMBRE --}}
            <div class="field full">

                <label for="name">
                    Nombre del jugador
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Ej: Federico Valverde"
                    required
                >

            </div>


            {{-- CATEGORÍA --}}
            <div class="field full">

                <label for="category_id">
                    Categoría
                </label>

                <select
                    id="category_id"
                    name="category_id"
                    required
                >

                    <option value="">
                        Selecciona una categoría...
                    </option>

                    @foreach ($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

            </div>


            {{-- PRECIO --}}
            <div class="field">

                <label for="price">
                    Precio de traspaso (€)
                </label>

                <input
                    type="number"
                    id="price"
                    name="price"
                    value="{{ old('price') }}"
                    min="0"
                    step="100000"
                    placeholder="45000000"
                    required
                >

            </div>


            {{-- DESCRIPCIÓN --}}
            <div class="field full">

                <label for="description">
                    Descripción / reporte de scouting
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="6"
                    placeholder="Características técnicas, fortalezas, historial del jugador..."
                    required
                >{{ old('description') }}</textarea>

            </div>

        </div>


        <div class="form-actions">

            <button
                type="submit"
                class="btn btn-gold"
            >
                Publicar ficha
            </button>

            <a
                href="{{ route('product.index') }}"
                class="btn btn-outline-dark"
            >
                Cancelar
            </a>

        </div>

    </form>

</section>


<style>

.error-box {
    margin-bottom: 20px;
    padding: 15px 20px;
    border-radius: 10px;
    background: #ffe8e8;
    border: 1px solid #d9534f;
    color: #842029;
}

.error-box ul {
    margin: 8px 0 0 20px;
}

</style>

@endsection