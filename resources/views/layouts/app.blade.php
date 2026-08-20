<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TransferMarket') | Mercado de Fichajes</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600;700&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header class="site-header">
        <nav class="nav container">
            <a href="{{ url('/') }}" class="brand">
                <span class="ball">⚽</span> Transfer<span class="brand-suffix">Market</span>
            </a>
            <ul class="nav-links">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ route('product.index') }}">Mercado</a></li>
                <li><a href="{{ route('product.create') }}" class="is-cta">Fichar jugador</a></li>
            </ul>
        </nav>

        <div class="ticker" aria-label="Últimos traspasos">
            @php
                $news = [
                    ['name' => 'D. Ferreira', 'from' => 'Porto Real', 'to' => 'Norte United', 'fee' => '€82M'],
                    ['name' => 'A. Solheim', 'from' => 'Bergen SK', 'to' => 'Milano Rossa', 'fee' => '€64M'],
                    ['name' => 'R. Adeyemi', 'from' => 'Lagos FC', 'to' => 'Bayern Ost', 'fee' => '€95M'],
                    ['name' => 'T. Kowalski', 'from' => 'Varsovia CF', 'to' => 'Sevilla Blanca', 'fee' => '€47M'],
                    ['name' => 'M. Duarte', 'from' => 'Belém SC', 'to' => 'Manchester Verde', 'fee' => '€110M'],
                ];
                // se repite una vez para que la animación cíclica no muestre huecos
                $news = array_merge($news, $news);
            @endphp
            <div class="ticker-track">
                @foreach ($news as $item)
                    <span class="ticker-item">
                        {{ $item['name'] }} <span class="arrow">→</span> {{ $item['to'] }}
                        <span class="fee">{{ $item['fee'] }}</span>
                    </span>
                @endforeach
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container">
            TransferMarket &copy; {{ date('Y') }} — Proyecto académico de e-commerce de fichajes de fútbol.
        </div>
    </footer>

</body>
</html>