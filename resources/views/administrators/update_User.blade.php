@extends('layouts.app')

@section('content')
    <div class="container edit-container">
        <div class="card col s12 m12 l3">
            <div class="card-panel">
                <form id="form_user_upadte" method="POST" action="{{ url('user/update',[$user->id]) }}">
                    <span class="card-title mdi mdi-24px mdi-account-edit "> Modificando usuario <b>{{$user->name}}</b></span>
                    <div class="row">

                        <div class="input-field col s12 m12 l4">
                            <input name="_token" type="hidden" value="{!! csrf_token() !!}"/>
                            <input id="nombre" name="name" type="text" class="validate" autofocus
                                   value="{{$user->name}}">
                            <label for="nombre">Nombre de usuario</label>

                            @if ($errors->has('name'))
                                <span class="help-block orange-text">
                            <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="input-field col s12 m12 l4">
                            <label class="active center-align" for="email">Correo</label>
                            <input id="email" type="email" data-error="wrong" data-success="right"
                                   class="validate s8" name="email" value="{{$user->email}}">

                            @if ($errors->has('email'))
                                <span class="help-block orange-text">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="input-field col s12 m12 l4">
                            <select name="is_admin">
                                <option value="" disabled selected>Tipo de usuario</option>
                                @if($user->is_admin)
                                    <option value="0">Usuario estandar</option>
                                    <option value="1" selected>Administrador</option>
                                @else
                                    <option value="0" selected>Usuario estandar</option>
                                    <option value="1">Administrador</option>
                                @endif
                            </select>
                            <label>Tipo de Usuario</label>
                            @if ($errors->has('is_admin'))
                                <span class="help-block orange-text">
                            <strong>{{ $errors->first('is_admin') }}</strong>
                            </span>
                            @endif
                        </div>


                    </div>
                    <div class="card-action right-align">
                        <a class="btn btn-flat waves-effect waves-red" href="/home">Cancelar</a>
                        <button class="btn btn-flat waves-effect waves-green" id="set_user" type="submit">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection