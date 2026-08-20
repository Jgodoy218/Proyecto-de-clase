@extends('layouts.app')

@section('title', 'Mercado')

@section('content')

    <section class="section container">
        <div class="section-head">
            <div>
                <span class="eyebrow">{{ count($players) }} jugadores disponibles</span>
                <h1>Mercado de fichajes</h1>
                <p>Explora la plantilla completa a la venta. Filtra por posición y entra a la ficha de cada jugador para ver todos sus datos.</p>
            </div>
        </div>

        <div class="filters" id="filters">
            <button class="chip is-active" data-filter="all">Todos</button>
            <button class="chip" data-filter="POR">Portero</button>
            <button class="chip" data-filter="DEF">Defensa</button>
            <button class="chip" data-filter="MED">Mediocampo</button>
            <button class="chip" data-filter="DEL">Delantero</button>
        </div>

        <div class="card-grid" id="player-grid">
            @forelse ($players as $player)
                <a href="{{ route('product.show', $player['id']) }}" class="card-link" data-position="{{ $player['position'] }}">
                    <div class="player-card" style="--pos-color: {{ $player['color'] }};">
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
                        <div class="club">{{ $player['club'] }} · {{ $player['fee'] }}</div>
                    </div>
                </a>
            @empty
                <p>Todavía no hay jugadores publicados. <a href="{{ route('product.create') }}" style="color:var(--pitch); text-decoration:underline;">Ficha el primero.</a></p>
            @endforelse
        </div>
    </section>

    <script>
        // Filtro simple en el cliente por posición, sin recargar la página.
        const chips = document.querySelectorAll('#filters .chip');
        const cards = document.querySelectorAll('#player-grid .card-link');

        chips.forEach(chip => {
            chip.addEventListener('click', () => {
                chips.forEach(c => c.classList.remove('is-active'));
                chip.classList.add('is-active');

                const filter = chip.dataset.filter;
                cards.forEach(card => {
                    const show = filter === 'all' || card.dataset.position === filter;
                    card.style.display = show ? '' : 'none';
                });
            });
        });
    </script>

@endsection