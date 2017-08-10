@extends('layouts.auth')

        <!-- Main Content -->
@section('content')



    <div class="col s12 z-depth-6 card-panel">
        <form class="login-form" role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col s12 center">
                    <a class="orange-text" href="{{ url('/') }}"> <img style="width: 100px"
                                                                       src="{{asset('images/mini.png')}}"></a>
                    <p class="center login-form-text">Renviar contraseña de acceso al usuario</p>
                </div>
            </div>

            <div class="row margin">
                <div class="input-field col s12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="active center-align" for="email">Direcciòn de correo</label>
                    <input id="email" type="email" data-error="wrong" data-success="right"
                           class="validate s8" name="email" value="{{ old('email') }}" autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block orange-text">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="form-group input-field col s12">
                    <button type="submit" class="btn btn-primary waves-effect waves-green col s12">
                        Enviar contraseña al correo
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m6 l6">
                    <p class="margin medium-small"><a href="{{ url('/register') }}">Registrarse ahora!</a></p>
                </div>
                <div class="input-field col s6 m6 l6">
                    <p class="margin right-align medium-small"><a href="{{ url('/login') }}">Acceder</a></p>
                </div>
            </div>


        </form>


    </div>




@endsection
