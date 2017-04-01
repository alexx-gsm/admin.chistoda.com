<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin | ЧистоДА</title>

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link href="/css/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav id="top-nav">
            <div class="top-nav__logo">
                <a href="{{ url('/admin') }}">
                    <img src="{{ asset('images/admin/logo.svg') }}" alt="ЧистоДа">
                </a>
            </div>
            <div class="top-nav__user">
                @if (Auth::check())
                    <div class="avatar"><i class="material-icons">account_box</i></div>
                    <div class="name">
                        <a class="name-link" href="#">{{ Auth::user()->name }}</a>
                    </div>
                @endif
            </div>
            <div id="left-menu">
                <div class="left-menu__title">DASHBOARD<i class="material-icons">chevron_left</i></div>
                <ul>
                    <li><a href="{{ url('/admin/price') }}"><i class="material-icons">language</i><span>ПРАЙС</span></a></li>
                    <li><a href="#"><i class="material-icons">language</i><span>НОВОСТИ</span></a></li>
                    <li><a href="#"><i class="material-icons">swap_horiz</i>БЛОГ</a></li>
                    <li><a href="#"><i class="material-icons">monetization_on</i>УСЛУГИ</a></li>
                    <li><a href="#"><i class="material-icons">view_comfy</i>КАТАЛОГ</a></li>
                    <li><a href="#"><i class="material-icons">people</i>КЛИЕНТЫ</a></li>
                    <li><a href="#"><i class="material-icons">traffic</i>ЗАЯВКИ</a></li>
                </ul>
            </div>
        </nav>

        <div class="content-wrapper">
            <div id="tool-panel">
                <a class="exit-link" href="{{ route('logout') }}"  role="button"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <i class="material-icons">exit_to_app</i>
                    Выход
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>

        @yield('content')

        </div>

    </div>

    {{--<!-- Scripts -->--}}
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
</body>
</html>
