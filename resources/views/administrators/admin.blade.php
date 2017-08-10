@extends('layouts.auth')

@section('content')


    <div class="row">
        <div class="col s12 z-depth-4 card-panel hoverable">
            <form class="login-form" role="form" method="POST" action="{{ url('/admins/login') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12 center">
                        <a class="orange-text" href="{{ url('/home') }}"> <h4>XM</h4></a>

                        <p class="center login-form-text">Iniciar secciòn Administrador</p>
                    </div>
                </div>

                <div class="row margin">
                    <div class="input-field col s12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="active center-align" for="email">Correo</label>
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
                    <div class="input-field col s12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="active center-align">Contraseña</label>
                        <input id="password" type="password" class="validate" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <div class="input-field col s12 m12 l12  login-text form-group">
                    <input type="checkbox" id="check" name="remember">
                    <label for="check"> Recordarme</label>

                </div>


                <div class="row">
                    <div class=" input-field col s12 form-group">

                        <button type="submit"
                                class="btn btn-primary waves-effect waves-green input-field col s12">
                            Acceder
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                        <p class="margin medium-small">
                            <a href="{{ url('/register') }}">Registrarse ahora</a>
                        </p>
                    </div>
                    <div class="input-field col s6 m6 l6">
                        <p class="margin right-align medium-small">
                            <a href="{{ url('/password/reset') }}">Olvido su contraseña?</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
