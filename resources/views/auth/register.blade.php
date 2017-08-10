@extends('layouts.auth')

@section('content')

    <div class="row">
        <div class="col s12 z-depth-6 card-panel hoverable">

            <form class="login-form" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12 center">
                        <a class="orange-text" href="{{ url('/') }}"> <img style="width: 100px" src="{{asset('images/mini.png')}}"></a>
                        <p class="center login-form-text">Registrar usuario en la aplicaciòn</p>
                    </div>
                </div>

                <div class="row margin">
                    <div class=" input-field col s12 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="active center-align">Usuario</label>
                        <input id="name" type="text" class="form-control validate" name="name"
                               value="{{ old('name') }}" autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="active center-align" for="email">Correo</label>
                        <input id="email" type="email" data-error="wrong" data-success="right"
                               class="validate s8" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block orange-text">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="active">Contraseña</label>


                        <input id="password" type="password" class="validate" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="active">Confirmar contraseña</label>


                        <input id="password-confirm" type="password" class="validate"
                               name="password_confirmation">

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn btn-primary waves-effect waves-green col s12">
                            Registrar ahora
                        </button>
                    </div>
                    <div class="input-field col s12">
                        <p class="margin center medium-small sign-up">Ya tienes cuenta? <a href="{{ url('/login') }}">Acceder</a></p>
                    </div>
                </div>



            </form>
        </div>


    </div>


@endsection
