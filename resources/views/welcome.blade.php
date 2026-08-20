@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

    <section class="hero">
        <div class="container hero-grid">
            <div>
                <span class="eyebrow">Ventana de fichajes abierta</span>
                <h1>Encuentra al <span class="gold-text">próximo crack</span> para tu club</h1>
                <p class="lead">
                    TransferMarket conecta clubes con jugadores libres y en venta.
                    Explora fichas completas, compara precios de traspaso y cierra
                    el fichaje que tu plantilla necesita.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('product.index') }}" class="btn btn-gold">Explorar el mercado</a>
                    <a href="{{ route('product.create') }}" class="btn btn-outline">Fichar un jugador</a>
                </div>

                <div class="hero-stats">
                    <div class="hero-stat">
                        <span class="num">312</span>
                        <span class="label">Jugadores activos</span>
                    </div>
                    <div class="hero-stat">
                        <span class="num">48</span>
                        <span class="label">Clubes registrados</span>
                    </div>
                    <div class="hero-stat">
                        <span class="num">€1.9B</span>
                        <span class="label">Movidos esta temporada</span>
                    </div>
                </div>
            </div>

            <div>
                @php
                    $featured = [
                        ['name' => 'D. Ferreira', 'position' => 'DEL', 'club' => 'Norte United', 'rating' => 91, 'fee' => '€82M', 'color' => '#7a1f1f'],
                        ['name' => 'A. Solheim', 'position' => 'MED', 'club' => 'Milano Rossa', 'rating' => 88, 'fee' => '€64M', 'color' => '#16513a'],
                    ];
                @endphp
                <div class="card-grid" style="grid-template-columns: repeat(2, 1fr); max-width: 420px; margin-left: auto;">
                    @foreach ($featured as $p)
                        <div class="player-card" style="--pos-color: {{ $p['color'] }};">
                            <div class="fee-tag">EN VENTA</div>
                            <div class="rating-row">
                                <span class="rating">{{ $p['rating'] }}</span>
                                <span class="position-badge">{{ $p['position'] }}</span>
                            </div>
                            <div class="silhouette">
                                <svg viewBox="0 0 100 130" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="currentColor" d="M50 8c9 0 16 7 16 16s-7 16-16 16-16-7-16-16 7-16 16-16zm-27 40h54l10 34-16 6-6-18v58H29V70l-6 18-16-6z"/>
                                </svg>
                            </div>
                            <div class="name">{{ $p['name'] }}</div>
                            <div class="club">{{ $p['club'] }} · {{ $p['fee'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section container">
        <div class="section-head">
            <div>
                <span class="eyebrow">Cómo funciona</span>
                <h2>De la ficha al fichaje, en tres pasos</h2>
            </div>
        </div>
        <div class="card-grid" style="grid-template-columns: repeat(3, 1fr);">
            <div>
                <h3 style="color:var(--pitch)">1. Explora</h3>
                <p>Revisa el listado completo de jugadores disponibles en <a href="{{ route('product.index') }}" style="color:var(--pitch); text-decoration:underline;">el mercado</a>, filtrando por posición.</p>
            </div>
            <div>
                <h3 style="color:var(--pitch)">2. Analiza la ficha</h3>
                <p>Entra al detalle de cada jugador para ver estatura, peso, pierna hábil, edad y precio de traspaso.</p>
            </div>
            <div>
                <h3 style="color:var(--pitch)">3. Ficha</h3>
                <p>¿Tienes un jugador para vender? <a href="{{ route('product.create') }}" style="color:var(--pitch); text-decoration:underline;">Publica su ficha</a> en minutos.</p>
            </div>
        </div>
    </section>

@endsection