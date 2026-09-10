@extends('layouts.app')

@section('title', 'Mercado')

@section('content')

<section class="section container">

    <div class="section-head">
        <div>
            <span class="eyebrow">
                {{ $players->count() }} jugadores disponibles
            </span>

            <h1>Mercado de fichajes</h1>

            <p>
                Explora todos los jugadores disponibles en el mercado.
                Revisa su información y encuentra el próximo fichaje para tu club.
            </p>
        </div>
    </div>


    <div class="filters" id="filters">

        <button class="chip chip-active" data-filter="all">
            Todos
        </button>

        <button class="chip" data-filter="1">
            Portero
        </button>

        <button class="chip" data-filter="2">
            Defensa
        </button>

        <button class="chip" data-filter="3">
            Mediocampo
        </button>

        <button class="chip" data-filter="4">
            Delantero
        </button>

    </div>


    <div class="card-grid" id="players-grid">

        @foreach ($players as $player)

            <div class="player-card">

                <div class="fee-tag">
                    EN VENTA
                </div>


                {{-- FOTO DEL JUGADOR --}}
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


                {{-- INFORMACIÓN --}}
                <div class="player-info">

                    <h3 class="name">
                        {{ $player->name }}
                    </h3>

                    <p class="description">
                        {{ $player->description }}
                    </p>

                    <div class="player-price">
                        €{{ number_format($player->price, 0, ',', '.') }}
                    </div>

                    <a
                        href="{{ route('product.show', $player->id) }}"
                        class="btn btn-gold"
                    >
                        Ver jugador
                    </a>

                </div>

            </div>

        @endforeach

    </div>

</section>


<style>

.player-image {
    width: 100%;
    height: 210px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: #f4f1e8;
    border-radius: 10px 10px 0 0;
}

.player-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.player-info {
    padding: 15px;
}

.player-info .name {
    margin: 0 0 8px;
    font-size: 22px;
}

.player-info .description {
    font-size: 14px;
    min-height: 45px;
    margin-bottom: 10px;
}

.player-price {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 12px;
}

.player-info .btn {
    display: inline-block;
    text-decoration: none;
}

</style>

@endsection