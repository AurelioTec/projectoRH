<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
</head>

<body>
    <div class="menu">
        <div class="logo">
            <h4>logotipo</h4>
        </div>
        <div class="users">
            <a href=""><i class="fa fa-user"></i>User</a>
            <a href="{{ route('sair') }}">Sair</a>
        </div>
    </div>
    <div class="corpo">
        <div class="menuLateral">
            <ul>
                <li><a href="">Dashboard</a></li>
                <li><a href="{{ route('usuario') }}">Usuário</a></li>
                <li><a href="{{ route('funcionario') }}">Funcionário</a></li>
                <li><a href="{{ route('recrutamento') }}">Recrutamento</a></li>
                <li><a href="{{ route('ferias') }}">Férias</a></li>
                <li><a href="">Faltas</a></li>
                <li><a href="">Salário</a></li>
                <li><a href="">Avaliação Desempenho</a></li>
                <li><a href="">Relatório de Férias</a></li>
                <li><a href="">Relatório de Faltas</a></li>
            </ul>
        </div>
        <div class="conteudo">
            @yield('gestao')
        </div>
    </div>
    <div>
        <h1>Rodapé</h1>
        <a href="{{ url('/') }}">Inicio</a>
    </div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
    <script>
        var msg = '{{ Session::get('Sucesso') }}';
        var exist = '{{ Session::has('Sucesso') }}';
        if (exist) {
            alert(msg);
        }
    </script>
</body>

</html>
