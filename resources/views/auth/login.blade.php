<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión - TransferMarket</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            min-height: 100vh;
            background:
                linear-gradient(rgba(3, 35, 23, 0.82), rgba(3, 35, 23, 0.90)),
                url('https://images.unsplash.com/photo-1579952363873-27f3bade9f55?auto=format&fit=crop&w=2000&q=85')
                center center / cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
        }

        .page {
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 40px 20px;
        }

        /* Texto izquierdo */
        .left-content {
            position: absolute;
            left: 6%;
            top: 50%;
            transform: translateY(-50%);
            width: 330px;
            color: white;
        }

        .left-content h1 {
            font-size: 43px;
            line-height: 1.08;
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 22px;
        }

        .left-content h1 span {
            color: #f4c62d;
        }

        .left-content p {
            font-size: 15px;
            line-height: 1.7;
            color: #e7eee9;
        }

        .yellow-line {
            width: 85px;
            height: 4px;
            background: #f4c62d;
            margin-top: 28px;
        }

        /* Texto derecho */
        .right-content {
            position: absolute;
            right: 6%;
            top: 50%;
            transform: translateY(-50%);
            width: 290px;
            color: white;
            text-align: center;
        }

        .right-content h2 {
            font-size: 38px;
            line-height: 1.1;
            font-weight: 800;
            text-transform: uppercase;
        }

        .right-content h2 span {
            color: #f4c62d;
        }

        .right-content p {
            margin-top: 20px;
            font-size: 14px;
            line-height: 1.6;
            color: #e7eee9;
        }

        .right-content .yellow-line {
            margin: 25px auto 0;
        }

        /* Tarjeta */
        .login-card {
            width: 430px;
            max-width: 100%;
            background: rgba(255, 255, 255, 0.97);
            border-radius: 18px;
            padding: 34px 38px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.35);
            position: relative;
            z-index: 5;
        }

        .brand {
            text-align: center;
            margin-bottom: 24px;
        }

        .brand-ball {
            font-size: 39px;
            margin-bottom: 5px;
        }

        .brand-name {
            font-size: 27px;
            font-weight: 800;
            color: #114c35;
        }

        .brand-name span {
            color: #e8b91f;
        }

        .brand-subtitle {
            color: #718096;
            font-size: 13px;
            margin-top: 5px;
        }

        .login-title {
            text-align: center;
            font-size: 25px;
            font-weight: 800;
            color: #102b20;
            margin-top: 22px;
        }

        .login-description {
            text-align: center;
            color: #718096;
            font-size: 13px;
            margin-top: 7px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 17px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #172b22;
            margin-bottom: 7px;
        }

        .form-input {
            width: 100%;
            height: 47px;
            border: 1px solid #d3d9d6;
            border-radius: 9px;
            padding: 0 14px;
            font-family: inherit;
            font-size: 13px;
            outline: none;
            background: white;
            transition: 0.2s;
        }

        .form-input:focus {
            border-color: #1e7548;
            box-shadow: 0 0 0 3px rgba(30, 117, 72, 0.12);
        }

        .error {
            color: #d93636;
            font-size: 12px;
            margin-top: 5px;
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 5px 0 22px;
            font-size: 12px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #66736d;
        }

        .remember input {
            accent-color: #1e7548;
        }

        .forgot {
            color: #1e7548;
            text-decoration: none;
            font-weight: 600;
        }

        .forgot:hover {
            text-decoration: underline;
        }

        .login-button {
            width: 100%;
            height: 48px;
            border: none;
            border-radius: 9px;
            background: #1e7548;
            color: white;
            font-family: inherit;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.2s;
        }

        .login-button:hover {
            background: #155b36;
            transform: translateY(-1px);
        }

        .register-link {
            text-align: center;
            margin-top: 21px;
            font-size: 12px;
            color: #68756f;
        }

        .register-link a {
            color: #1e7548;
            font-weight: 700;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .status {
            background: #e9f7ef;
            border: 1px solid #b8dfc7;
            color: #17643a;
            border-radius: 8px;
            padding: 10px;
            font-size: 12px;
            margin-bottom: 15px;
            text-align: center;
        }

        @media (max-width: 1050px) {
            .left-content,
            .right-content {
                display: none;
            }

            .login-card {
                width: 430px;
            }
        }

        @media (max-width: 500px) {
            .page {
                padding: 20px;
            }

            .login-card {
                padding: 28px 22px;
            }

            .brand-name {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <!-- TEXTO IZQUIERDO -->
    <div class="left-content">
        <h1>
            MÁS QUE<br>
            UN JUEGO,<br>
            <span>UNA PASIÓN.</span>
        </h1>

        <p>
            Únete a TransferMarket y descubre un mercado
            creado para los amantes del fútbol.
        </p>

        <div class="yellow-line"></div>
    </div>


    <!-- LOGIN -->
    <div class="login-card">

        <div class="brand">
            <div class="brand-ball">⚽</div>

            <div class="brand-name">
                Transfer<span>Market</span>
            </div>

            <div class="brand-subtitle">
                Compra, vende y vive el fútbol
            </div>
        </div>


        <h2 class="login-title">
            Iniciar sesión
        </h2>

        <p class="login-description">
            Entra a tu cuenta de TransferMarket
        </p>


        @if (session('status'))
            <div class="status">
                {{ session('status') }}
            </div>
        @endif


        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- CORREO -->
            <div class="form-group">

                <label class="form-label" for="email">
                    Correo electrónico
                </label>

                <input
                    id="email"
                    class="form-input"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="tu@email.com"
                    required
                    autofocus
                    autocomplete="username"
                >

                @error('email')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- CONTRASEÑA -->
            <div class="form-group">

                <label class="form-label" for="password">
                    Contraseña
                </label>

                <input
                    id="password"
                    class="form-input"
                    type="password"
                    name="password"
                    placeholder="Tu contraseña"
                    required
                    autocomplete="current-password"
                >

                @error('password')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- OPCIONES -->
            <div class="options">

                <label class="remember">
                    <input
                        id="remember"
                        type="checkbox"
                        name="remember"
                    >

                    <span>
                        Recordarme
                    </span>
                </label>


                @if (Route::has('password.request'))
                    <a
                        class="forgot"
                        href="{{ route('password.request') }}"
                    >
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif

            </div>


            <!-- BOTÓN -->
            <button
                type="submit"
                class="login-button"
            >
                INICIAR SESIÓN →
            </button>

        </form>


        <!-- REGISTRO -->
        <div class="register-link">
            ¿No tienes una cuenta?

            <a href="{{ route('register') }}">
                Crear cuenta
            </a>
        </div>

    </div>


    <!-- TEXTO DERECHO -->
    <div class="right-content">

        <h2>
            EL FÚTBOL<br>
            <span>NOS CONECTA.</span>
        </h2>

        <p>
            Forma parte del mercado y encuentra
            nuevas oportunidades para tu club.
        </p>

        <div class="yellow-line"></div>

    </div>

</div>

</body>
</html>