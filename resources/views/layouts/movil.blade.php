<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('images/ic_launcher.png')}}" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="{{asset('libs/materialize/css/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/iconos.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/store.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('libs/MaterialDesignIcons/css/materialdesignicons.min.css')}}">
    <script type="text/javascript" src="{{asset('libs/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('libs/materialize/js/materialize.js')}}"></script>

    <title>XMovil</title>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode(
                [
                        'csrfToken' => csrf_token()]
        ); ?>
    </script>
</head>
<body>


<nav class="grey darken-2">
    <div class="nav-wrapper " id="app-navbar-collapse">
        <div class="brand-pd">

            <!-- Branding Image -->
            <a class="brand-logo orange-text left" href="{{ url('/home') }}">
                <b>X</b>M
            </a>
        </div>



        <!-- Right Side Of Navbar -->
        <ul class="right">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a class="waves-effect waves-green mdi mdi-chevron-right mdi-24px" href="{{ url('/login') }}"> Acceder</a></li>
                <li><a class="waves-effect waves-green mdi mdi-chevron-right mdi-24px" href="{{ url('/register') }}"> Registro</a></li>
            @else
                @if(Auth::user()->is_admin)
                    <li><a class="mdi mdi-cellphone-android mdi-24px" href="movil"> Moviles</a></li>
                @endif
                <li>

                    <a href="#" class="dropdown-button mdi mdi-account-circle mdi-24px" data-activates='dropdownMenu' role="button">
                        {{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i>
                    </a>

                    <ul class="dropdown-content" role="menu" id='dropdownMenu' style="">
                        @if(Auth::user()->is_admin)
                            <li><a class="mdi mdi-account-settings-variant mdi-24px" href="admin/profile"> Configuración</a></li>
                        @endif
                        <li>
                            <a class="waves-effect waves-red mdi mdi-logout-variant mdi-24px" href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                Salir
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>

</nav>

@yield('content')


        <!-- Scripts -->


<script src="/js/xmovil.js"></script>
<script src="/js/list.js"></script>
</body>
</html>
