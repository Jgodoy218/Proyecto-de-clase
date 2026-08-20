@extends('layouts.app')

@section('title', $player['name'])

@section('content')

    <section class="section container">
        <a href="{{ route('product.index') }}" class="back-link">&larr; Volver al mercado</a>

        <div class="detail-grid">

            <div class="detail-card-wrap">
                <div class="player-card" style="--pos-color: {{ $player['color'] }}; aspect-ratio: 3/4;">
                    <div class="fee-tag">EN VENTA</div>
                    <div class="rating-row">
                        <span class="rating">{{ $player['rating'] }}</span>
                        <span class="position-badge">{{ $player['position'] }}</span>
                    </div>
                    <div class="silhouette">
                        <svg viewBox="0 0 100 130" xmlns="http://www.w3.org/2000/svg">
                            <path fill="currentColor" d="M50 8c9 0 16 7 16 16s-7 16-16 16-16-7-16-16 7-16 16-16zm-27 40h54l10 34-16 6-6-18v58H29V70l-6 18-16-6z"/>
                        </svg>
                    </div>
                    <div class="name">{{ $player['name'] }}</div>
                    <div class="club">{{ $player['club'] }}</div>
                </div>

                <div class="price-panel">
                    <span class="label">Precio de traspaso</span>
                    <div class="price">{{ $player['fee'] }}</div>
                </div>
            </div>

            <div class="detail-body">
                <span class="eyebrow">Ficha #{{ $player['id'] }}</span>
                <h2>{{ $player['name'] }}</h2>

                <div class="badge-row">
                    <span class="badge">{{ $player['club'] }}</span>
                    <span class="badge">{{ $player['nationality'] }}</span>
                    <span class="badge">{{ $player['age'] }} años</span>
                </div>

                <p class="desc">{{ $player['description'] }}</p>

                <div class="stat-sheet">
                    <div class="stat-sheet-head">
                        <h3 style="color:#fff; margin-bottom:4px;">Datos físicos y de juego</h3>
                        <span class="club-line">Reporte de scouting</span>
                    </div>
                    <ul class="stat-list">
                        <li><span>Posición</span><span>{{ $player['position'] }}</span></li>
                        <li><span>Pierna hábil</span><span>{{ $player['foot'] }}</span></li>
                        <li><span>Estatura</span><span>{{ $player['height'] }} cm</span></li>
                        <li><span>Peso</span><span>{{ $player['weight'] }} kg</span></li>
                        <li><span>Edad</span><span>{{ $player['age'] }} años</span></li>
                        <li><span>Nacionalidad</span><span>{{ $player['nationality'] }}</span></li>
                        <li><span>Club actual</span><span>{{ $player['club'] }}</span></li>
                        <li><span>Valoración</span><span>{{ $player['rating'] }} / 99</span></li>
                    </ul>
                </div>

                <div class="form-actions" style="margin-top: 28px;">
                    <a href="#" class="btn btn-gold">Fichar por {{ $player['fee'] }}</a>
                    <a href="{{ route('product.index') }}" class="btn btn-outline-dark">Ver más jugadores</a>
                </div>
            </div>

        </div>
    </section>

@endsection