@extends('layouts.app')

@section('title', 'Mercado')

@section('content')

<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background: #f3f5f4;
        color: #17251f;
    }

    .market-page {
        min-height: 100vh;
        background:
            linear-gradient(rgba(8, 38, 25, 0.92), rgba(8, 38, 25, 0.92)),
            url('https://images.unsplash.com/photo-1579952363873-27f3bade9f55?auto=format&fit=crop&w=2000&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        padding-bottom: 70px;
    }

    /* HERO */

    .market-hero {
        max-width: 1250px;
        margin: 0 auto;
        padding: 55px 25px 35px;
        color: white;
    }

    .market-label {
        display: inline-block;
        background: #e8b923;
        color: #10261b;
        font-size: 13px;
        font-weight: 800;
        padding: 7px 14px;
        border-radius: 30px;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 15px;
    }

    .market-hero h1 {
        margin: 0;
        font-size: 48px;
        font-weight: 900;
        letter-spacing: -1px;
    }

    .market-hero p {
        max-width: 720px;
        margin: 15px 0 0;
        font-size: 17px;
        line-height: 1.6;
        color: #dce7e1;
    }

    .market-stats {
        display: flex;
        gap: 15px;
        margin-top: 28px;
        flex-wrap: wrap;
    }

    .stat-box {
        background: rgba(255,255,255,0.10);
        border: 1px solid rgba(255,255,255,0.15);
        border-radius: 12px;
        padding: 13px 20px;
        backdrop-filter: blur(8px);
    }

    .stat-number {
        font-size: 22px;
        font-weight: 900;
        color: #e8b923;
    }

    .stat-text {
        font-size: 12px;
        color: #dce7e1;
    }

    /* CONTENT */

    .market-content {
        max-width: 1250px;
        margin: 0 auto;
        padding: 0 25px;
    }

    .market-panel {
        background: #f5f7f6;
        border-radius: 22px;
        padding: 25px;
        box-shadow: 0 15px 50px rgba(0,0,0,0.25);
    }

    .market-panel-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 22px;
        flex-wrap: wrap;
    }

    .market-panel-title h2 {
        margin: 0;
        font-size: 24px;
        font-weight: 900;
        color: #17251f;
    }

    .market-panel-title span {
        color: #66736d;
        font-size: 14px;
    }

    /* FILTERS */

    .filters {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 28px;
    }

    .chip {
        border: 1px solid #d4ddd8;
        background: white;
        color: #30423a;
        padding: 10px 18px;
        border-radius: 30px;
        cursor: pointer;
        font-weight: 700;
        font-size: 14px;
        transition: 0.2s ease;
    }

    .chip:hover {
        border-color: #1d6b43;
        transform: translateY(-1px);
    }

    .chip-active {
        background: #176b42;
        color: white;
        border-color: #176b42;
    }

    /* CARDS */

    .card-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 22px;
    }

    .player-card {
        background: white;
        border-radius: 17px;
        overflow: hidden;
        border: 1px solid #e2e8e5;
        box-shadow: 0 7px 20px rgba(16, 45, 32, 0.08);
        transition: 0.25s ease;
        position: relative;
    }

    .player-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 30px rgba(16, 45, 32, 0.16);
    }

    .fee-tag {
        position: absolute;
        top: 13px;
        left: 13px;
        z-index: 5;
        background: #e8b923;
        color: #15291f;
        padding: 7px 11px;
        border-radius: 7px;
        font-size: 11px;
        font-weight: 900;
        letter-spacing: .5px;
    }

    .player-image {
        width: 100%;
        height: 285px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background:
            linear-gradient(145deg, #123d29, #1c7548);
        position: relative;
    }

    .player-image::after {
        content: "";
        position: absolute;
        inset: 0;
        background:
            linear-gradient(transparent 65%, rgba(0,0,0,.45)),
            repeating-linear-gradient(
                90deg,
                transparent 0,
                transparent 48px,
                rgba(255,255,255,.025) 49px,
                transparent 50px
            );
        pointer-events: none;
    }

    .player-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        position: relative;
        z-index: 2;
        padding: 18px;
        transition: transform .3s ease;
    }

    .player-card:hover .player-image img {
        transform: scale(1.04);
    }

    .player-info {
        padding: 20px;
    }

    .player-position {
        color: #1d7548;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 7px;
    }

    .player-info .name {
        margin: 0 0 8px;
        font-size: 22px;
        font-weight: 900;
        color: #17251f;
    }

    .player-info .description {
        color: #68756f;
        font-size: 14px;
        line-height: 1.5;
        min-height: 42px;
        margin: 0 0 16px;
    }

    .player-bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        border-top: 1px solid #edf0ee;
        padding-top: 15px;
    }

    .player-price {
        font-size: 20px;
        font-weight: 900;
        color: #176b42;
    }

    .btn-gold {
        display: inline-block;
        text-decoration: none;
        background: #e8b923;
        color: #17251f;
        padding: 10px 15px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 900;
        transition: .2s;
        white-space: nowrap;
    }

    .btn-gold:hover {
        background: #d4a916;
        transform: translateY(-1px);
    }

    /* SIN RESULTADOS */

    .no-results {
        display: none;
        text-align: center;
        padding: 50px 20px;
        color: #68756f;
    }

    .no-results-icon {
        font-size: 45px;
        margin-bottom: 10px;
    }

    .no-results h3 {
        color: #17251f;
        margin: 0 0 7px;
    }

    /* RESPONSIVE */

    @media (max-width: 1000px) {
        .card-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .market-hero h1 {
            font-size: 40px;
        }
    }

    @media (max-width: 650px) {
        .market-hero {
            padding: 35px 18px 25px;
        }

        .market-content {
            padding: 0 12px;
        }

        .market-panel {
            padding: 17px;
            border-radius: 15px;
        }

        .card-grid {
            grid-template-columns: 1fr;
        }

        .market-hero h1 {
            font-size: 32px;
        }

        .market-hero p {
            font-size: 15px;
        }

        .player-image {
            height: 300px;
        }
    }
</style>


<div class="market-page">

    <!-- HERO -->

    <section class="market-hero">

        <span class="market-label">
            ⚽ Mercado de fichajes
        </span>

        <h1>
            Encuentra tu próximo fichaje
        </h1>

        <p>
            Explora todos los jugadores disponibles en el mercado.
            Revisa sus características, compara precios y encuentra
            el jugador que necesita tu club.
        </p>

        <div class="market-stats">

            <div class="stat-box">
                <div class="stat-number">
                    {{ $players->count() }}
                </div>
                <div class="stat-text">
                    Jugadores disponibles
                </div>
            </div>

            <div class="stat-box">
                <div class="stat-number">
                    4
                </div>
                <div class="stat-text">
                    Posiciones
                </div>
            </div>

            <div class="stat-box">
                <div class="stat-number">
                    100%
                </div>
                <div class="stat-text">
                    Mercado activo
                </div>
            </div>

        </div>

    </section>


    <!-- MARKET -->

    <section class="market-content">

        <div class="market-panel">

            <div class="market-panel-title">

                <div>
                    <h2>Jugadores en venta</h2>
                    <span>
                        Selecciona un jugador para consultar su ficha.
                    </span>
                </div>

                <span>
                    {{ $players->count() }} resultados
                </span>

            </div>


            <!-- FILTROS -->

            <div class="filters" id="filters">

                <button class="chip chip-active" data-filter="all">
                    Todos
                </button>

                <button class="chip" data-filter="1">
                    🧤 Portero
                </button>

                <button class="chip" data-filter="2">
                    🛡️ Defensa
                </button>

                <button class="chip" data-filter="3">
                    🎯 Mediocampo
                </button>

                <button class="chip" data-filter="4">
                    ⚡ Delantero
                </button>

            </div>


            <!-- JUGADORES -->

            <div class="card-grid" id="players-grid">

                @foreach ($players as $player)

                    <div
                        class="player-card"
                        data-category="{{ $player->category_id }}"
                    >

                        <div class="fee-tag">
                            EN VENTA
                        </div>


                        <!-- FOTO -->

                        <div class="player-image">

                            @if($player->image)

                                <img
                                    src="{{ $player->image }}"
                                    alt="{{ $player->name }}"
                                    loading="lazy"
                                >

                            @else

                                <img
                                    src="https://api.dicebear.com/9.x/personas/svg?seed=player{{ $player->id }}"
                                    alt="{{ $player->name }}"
                                    loading="lazy"
                                >

                            @endif

                        </div>


                        <!-- INFORMACIÓN -->

                        <div class="player-info">

                            <div class="player-position">

                                @if($player->category_id == 1)
                                    Portero
                                @elseif($player->category_id == 2)
                                    Defensa
                                @elseif($player->category_id == 3)
                                    Mediocampo
                                @elseif($player->category_id == 4)
                                    Delantero
                                @else
                                    Jugador
                                @endif

                            </div>

                            <h3 class="name">
                                {{ $player->name }}
                            </h3>

                            <p class="description">
                                {{ $player->description }}
                            </p>

                            <div class="player-bottom">

                                <div class="player-price">
                                    €{{ number_format($player->price, 0, ',', '.') }}
                                </div>

                                <a
                                    href="{{ route('product.show', $player->id) }}"
                                    class="btn-gold"
                                >
                                    Ver jugador →
                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


            <!-- SIN RESULTADOS -->

            <div class="no-results" id="no-results">

                <div class="no-results-icon">
                    ⚽
                </div>

                <h3>
                    No hay jugadores disponibles
                </h3>

                <p>
                    No encontramos jugadores en esta posición.
                </p>

            </div>

        </div>

    </section>

</div>


<script>

    document.addEventListener('DOMContentLoaded', function () {

        const buttons = document.querySelectorAll('.chip');
        const players = document.querySelectorAll('.player-card');
        const noResults = document.getElementById('no-results');

        buttons.forEach(button => {

            button.addEventListener('click', function () {

                const filter = this.dataset.filter;

                buttons.forEach(btn => {
                    btn.classList.remove('chip-active');
                });

                this.classList.add('chip-active');

                let visiblePlayers = 0;

                players.forEach(player => {

                    const category = player.dataset.category;

                    if (filter === 'all' || category === filter) {

                        player.style.display = 'block';
                        visiblePlayers++;

                    } else {

                        player.style.display = 'none';

                    }

                });

                if (visiblePlayers === 0) {
                    noResults.style.display = 'block';
                } else {
                    noResults.style.display = 'none';
                }

            });

        });

    });

</script>

@endsection