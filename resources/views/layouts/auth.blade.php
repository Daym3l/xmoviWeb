<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('images/ic_launcher.png')}}" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="{{asset('libs/materialize/css/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/general.css')}}">


    <title>XMovil</title>

    <!-- Scaripts -->
    <script>
        window.Laravel =<?php echo json_encode(
                [
                        'csrfToken' => csrf_token(),]
        ); ?>


    </script>
    <style>
        .fondo1 {
            background: url("{{asset('images/background/1.jpg')}}") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .fondo2 {
            background: url("{{asset('images/background/2.jpg')}}") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .fondo3 {
            background: url("{{asset('images/background/3.jpg')}}") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .fondo4 {
            background: url("{{asset('images/background/4.jpg')}}") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
    <script type="application/javascript">
        var fondos = ["fondo1", "fondo2", "fondo3", "fondo4"];
        function fondoBody()
        {
            var image = fondos[Math.floor(Math.random() * fondos.length)]
            document.body.className = image;
        }
    </script>
</head>
<body onLoad="javascript:fondoBody();">


@yield('content')

        <!-- Scripts -->
<script type="text/javascript" src="{{asset('libs/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('libs/materialize/js/materialize.js')}}"></script>
<script src="/js/app.js"></script>
</body>
</html>
