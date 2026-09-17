<div class="detail-actions">

    @auth

        @if($player->owners()->where('user_id', auth()->id())->exists())

            <form
                method="POST"
                action="{{ route('product.sell', $player->id) }}"
            >
                @csrf

                <button
                    type="submit"
                    class="btn-market btn-sell"
                >
                    💰 Vender jugador
                </button>
            </form>

        @elseif(!$player->owners()->exists())

            <form
                method="POST"
                action="{{ route('product.buy', $player->id) }}"
            >
                @csrf

                <button
                    type="submit"
                    class="btn-market btn-buy"
                >
                    🛒 Comprar jugador
                </button>
            </form>

        @else

            <div class="already-sold">
                🔒 Este jugador ya pertenece a otro club
            </div>

        @endif

    @endauth

    <a
        href="{{ route('product.index') }}"
        class="btn-market btn-secondary-market"
    >
        ← Ver mercado
    </a>

</div>