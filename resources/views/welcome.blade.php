<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('images/ic_launcher.png')}}" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="{{asset('libs/materialize/css/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/iconos.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('libs/MaterialDesignIcons/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/welcome.css')}}">
    <script type="text/javascript" src="{{asset('libs/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('libs/materialize/js/materialize.js')}}"></script>

    <title>XMovil</title>


</head>
<body>

<div class="navbar-fixed ">
    <nav class="grey darken-2" role="navigation">
        <div class="nav-wrapper container">
            @if (Auth::guest())
            <a id="logo-container" href="/home" class="brand-logo orange-text left">Xm</a>
            @else
                <a id="logo-container" href="/home" class="brand-logo mdi mdi-backburger mdi-28px orange-text left"> XM</a>
            @endif
            <div>
                @if (Route::has('login'))
                    <div class="nav-wrapper">
                        <ul class="right">
                            @if (Auth::guest())
                                <li><a class="waves-effect waves-green mdi mdi-chevron-right mdi-24px  " aria-hidden="true" href="{{ url('/login') }}"> Acceder</a></li>
                                <li><a class="waves-effect waves-green mdi mdi-chevron-right mdi-24px" href="{{ url('/register') }}"> Registro</a>

                                </li>

                            @else
                                <li>
                                    <a href="#" class="dropdown-button  mdi mdi-account-circle mdi-24px " data-activates='dropdownMenu'
                                       role="button">
                                        {{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i>
                                    </a>

                                    <ul class="dropdown-content" role="menu" id='dropdownMenu' style="">
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
                @endif


            </div>

        </div>
    </nav>
</div>
<div class="section no-pad-bot " id="index-banner">
    <div class="container" style="position: relative">


        <div class="row center-align"><img src="{{asset('images/logo.png')}}">
            <div class="row center-align">


                <div class="input-field col s12 m12 l12">
                    <a data-position="right" data-delay="50" data-tooltip="Descargar apliación." href="{{asset('xmovil/apk/xmovil.apk')}}" class=" btn tooltipped orange center-align mdi mdi-android-debug-bridge mdi-24px">Xmovil</a>


                </div>
                <div class="input-field col s12 m12 l12">

                    <a data-position="right" data-delay="50" data-tooltip="Descargar datos de la aplicación." href="{{asset('xmovil/apk/XMOVIL/xmovil.db')}}" class="btn tooltipped orange center-align mdi mdi-database mdi-24px"> Datos bd</a>

                </div>

            </div>
            <div class="row center-align"> <span class="grey-text update">Última actualización del: {{$moviles[count($cant)-1]["updated_at"]}} </span></div>
        </div>
        <span class="orange-text"><h5>Últimos modelos registrados.</h5></span>
        <ul id="row_prod"  class="row produktliste">
            @if(count($moviles)>0)
                @foreach($moviles as $moviles)
                    <li style="opacity: 0" class="col l4 m6 s12 ">
                        <div class="card">
                            <div class="card-image">
                                <img alt="{{$moviles['name']}}"
                                     src="{{asset('xmovil/apk/XMOVIL/moviles/')}}/{{$moviles['model']}}.jpg">
                            </div>
                            <div class="card-content">
                                <h3>
                                    <a>{{$moviles['name']}}</a>
                                </h3>
                                <div class="pos_row">
                            <span>
                            <i class=" mdi mdi-cellphone mdi-24px" aria-hidden="true"></i>
                           <span class="iconos">
                            {{$moviles['pantalla']}} in
                           </span>
                        </span>
                         <span>
                           <i class=" mdi mdi-sd mdi-24px"></i>
                           <span class="iconos">
                            {{$moviles['internal']}} GB
                           </span>
                        </span>
                         <span>
                           <i class=" mdi mdi-memory mdi-24px"></i>
                           <span class="iconos">
                            {{$moviles['ram']}} GB
                           </span>
                        </span>
                         <span>
                           <i class="mdi mdi-battery-outline mdi-24px"></i>
                           <span class="iconos">
                            {{$moviles['bateria']}} mAh
                           </span>
                        </span>
                                </div>

                            </div>
                            <div class="card-action row right-align">
                     <span class="col s12">
                <span class="price">Precio: ${{$moviles['precio']}}</span>
                         @endforeach
                         @endif

                </span>
                            </div>
                        </div>

        </ul>
    </div>


</div>

<footer class="page-footer grey darken-1 ">
    <div class="center ">
        <div class="col l6 s12">
            <h5 class="white-text">Contacto</h5>
            <div class="chip">
                <img src="{{asset('images/yo.png')}}">
                Ing.Daymel Machado Cabrera
            </div>

            <p class="grey-text text-lighten-4"><i class="mdi mdi-email mdi-24px"></i>
                <a class="black-text text-lighten-4 ">daym3l@nauta.cu</a>
            </p>
            <p class="grey-text text-lighten-4"><i class="mdi mdi-cellphone-basic mdi-24px"></i>
                <a class="black-text text-lighten-4">+535 283 22 78</a>
            </p>
            {{--<p class="grey-text text-lighten-4">Sitio:--}}
                {{--<a href="http://j0kk3r.cubava.cu" class="black-text text-lighten-4">TecnoHabana</a>--}}

            {{--</p>--}}


        </div>

    </div>
    </div>

    <div class="footer-copyright">

        <div class="container center ">

            Copyright © 2016 <a class="grey-text text-lighten-3">TBmos</a> Todos los derechos reservados.
        </div>
    </div>
</footer>


<script type="text/javascript" src="{{asset('js/xmovil.js')}}"></script>

</body>
</html>
