<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrarse | Transfer Market</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
            background:
                linear-gradient(rgba(3, 35, 20, 0.72), rgba(3, 35, 20, 0.82)),
                url('https://images.unsplash.com/photo-1579952363873-27f3bade9f55?auto=format&fit=crop&w=2000&q=85')
                center center / cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(90deg, transparent 49%, rgba(255,255,255,0.04) 50%, transparent 51%);
            background-size: 90px 90px;
            pointer-events: none;
        }

        .stadium-light {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 130px;
            background: linear-gradient(
                to bottom,
                rgba(255,255,255,0.18),
                transparent
            );
            pointer-events: none;
        }

        .page {
            width: 100%;
            max-width: 1150px;
            display: grid;
            grid-template-columns: 1fr 460px 1fr;
            align-items: center;
            gap: 45px;
            position: relative;
            z-index: 2;
        }

        /* LADO IZQUIERDO */

        .side-left {
            color: white;
        }

        .ball {
            font-size: 65px;
            margin-bottom: 20px;
        }

        .side-left h2 {
            font-size: 44px;
            line-height: 1;
            text-transform: uppercase;
            margin-bottom: 18px;
            font-weight: 900;
        }

        .side-left h2 span {
            color: #d9ad28;
        }

        .side-left p {
            font-size: 17px;
            line-height: 1.6;
            color: #e8eee9;
            max-width: 360px;
        }

        .line {
            width: 90px;
            height: 4px;
            background: #d9ad28;
            margin-top: 25px;
        }

        /* TARJETA */

        .register-card {
            background: rgba(255, 255, 255, 0.97);
            border-radius: 18px;
            padding: 35px 40px;
            box-shadow:
                0 25px 70px rgba(0, 0, 0, 0.45),
                0 0 0 1px rgba(255,255,255,0.2);
        }

        .logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo-ball {
            font-size: 48px;
            display: block;
            margin-bottom: 8px;
        }

        .logo h1 {
            font-size: 30px;
            font-weight: 900;
            color: #0b3923;
        }

        .logo h1 span {
            color: #d9ad28;
        }

        .logo p {
            color: #66716b;
            margin-top: 5px;
            font-size: 14px;
        }

        .title {
            text-align: center;
            margin-bottom: 25px;
        }

        .title h2 {
            font-size: 25px;
            color: #17231c;
            margin-bottom: 7px;
        }

        .title p {
            color: #69736d;
            font-size: 14px;
        }

        /* ERRORES */

        .errors {
            background: #fff0f0;
            border: 1px solid #e3aaaa;
            color: #a52a2a;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .errors ul {
            padding-left: 18px;
        }

        /* CAMPOS */

        .field {
            margin-bottom: 17px;
        }

        .field label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #26332b;
            margin-bottom: 7px;
        }

        .input-wrap {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 17px;
            color: #53705f;
        }

        .field input {
            width: 100%;
            height: 48px;
            border: 1px solid #d1d8d3;
            border-radius: 9px;
            padding: 0 14px 0 43px;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
            background: #fff;
        }

        .field input:focus {
            border-color: #0b6339;
            box-shadow: 0 0 0 3px rgba(11, 99, 57, 0.12);
        }

        /* BOTÓN */

        .register-button {
            width: 100%;
            height: 50px;
            border: none;
            border-radius: 9px;
            background: #0b6339;
            color: white;
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: 0.2s;
            margin-top: 5px;
        }

        .register-button:hover {
            background: #084a2b;
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(11, 99, 57, 0.25);
        }

        .login {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: #68736c;
        }

        .login a {
            color: #0b6339;
            font-weight: 700;
            text-decoration: none;
        }

        .login a:hover {
            text-decoration: underline;
        }

        /* LADO DERECHO */

        .side-right {
            color: white;
            text-align: right;
        }

        .side-right h2 {
            font-size: 37px;
            line-height: 1.05;
            font-weight: 900;
            text-transform: uppercase;
        }

        .side-right h2 span {
            color: #d9ad28;
        }

        .side-right p {
            margin-top: 15px;
            color: #dce8df;
            font-size: 15px;
            line-height: 1.5;
        }

        .right-line {
            width: 100px;
            height: 4px;
            background: #d9ad28;
            margin: 20px 0 0 auto;
        }

        /* RESPONSIVE */

        @media (max-width: 950px) {
            .page {
                grid-template-columns: 1fr 460px;
            }

            .side-right {
                display: none;
            }
        }

        @media (max-width: 650px) {
            body {
                padding: 15px;
            }

            .page {
                display: block;
            }

            .side-left {
                display: none;
            }

            .register-card {
                padding: 28px 22px;
            }
        }
    </style>
</head>

<body>

    <div class="stadium-light"></div>

    <div class="page">

        <!-- LADO IZQUIERDO -->

        <div class="side-left">

            <div class="ball">⚽</div>

            <h2>
                Más que un juego,
                <span>una pasión.</span>
            </h2>

            <p>
                Únete a Transfer Market y descubre un mercado
                creado para los amantes del fútbol.
            </p>

            <div class="line"></div>

        </div>


        <!-- FORMULARIO -->

        <div class="register-card">

            <div class="logo">

                <span class="logo-ball">⚽</span>

                <h1>
                    Transfer<span>Market</span>
                </h1>

                <p>
                    Compra, vende y vive el fútbol
                </p>

            </div>


            <div class="title">

                <h2>
                    Crea tu cuenta
                </h2>

                <p>
                    Únete a nuestra comunidad futbolera
                </p>

            </div>


            @if ($errors->any())

                <div class="errors">

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form method="POST" action="{{ route('register') }}">

                @csrf


                <!-- NOMBRE -->

                <div class="field">

                    <label for="name">
                        Nombre
                    </label>

                    <div class="input-wrap">

                        <span class="input-icon">👤</span>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Tu nombre"
                            required
                            autofocus
                            autocomplete="name"
                        >

                    </div>

                </div>


                <!-- CORREO -->

                <div class="field">

                    <label for="email">
                        Correo electrónico
                    </label>

                    <div class="input-wrap">

                        <span class="input-icon">✉️</span>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="tu@email.com"
                            required
                            autocomplete="username"
                        >

                    </div>

                </div>


                <!-- CONTRASEÑA -->

                <div class="field">

                    <label for="password">
                        Contraseña
                    </label>

                    <div class="input-wrap">

                        <span class="input-icon">🔒</span>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Mínimo 8 caracteres"
                            required
                            autocomplete="new-password"
                        >

                    </div>

                </div>


                <!-- CONFIRMAR -->

                <div class="field">

                    <label for="password_confirmation">
                        Confirmar contraseña
                    </label>

                    <div class="input-wrap">

                        <span class="input-icon">🔒</span>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            placeholder="Confirma tu contraseña"
                            required
                            autocomplete="new-password"
                        >

                    </div>

                </div>


                <button
                    type="submit"
                    class="register-button"
                >
                    REGISTRARME →
                </button>

            </form>


            <div class="login">

                ¿Ya tienes una cuenta?

                <a href="{{ route('login') }}">
                    Iniciar sesión
                </a>

            </div>

        </div>


        <!-- LADO DERECHO -->

        <div class="side-right">

            <h2>
                El fútbol
                <span>nos conecta.</span>
            </h2>

            <p>
                Forma parte del mercado y encuentra
                nuevas oportunidades para tu club.
            </p>

            <div class="right-line"></div>

        </div>

    </div>

</body>

</html>