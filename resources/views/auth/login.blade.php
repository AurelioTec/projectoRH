<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="base">
        <div class="formulario">
            <div class="titulo">
                <h2>LOGIN</h2>
                <h4>Sistema RH</h4>
            </div>
            <form action="{{ route('login') }}" method="POST" enctype="">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="text" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input id="password" type="password" name="password">
                </div>

                <div class="form-group">
                    <button type="submit">Entrar</button>
                </div>

            </form>
        </div>
    </div>
</body>

</html>
