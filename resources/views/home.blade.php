@extends('layouts.app')

@section('content')
    @if(Auth::user()->is_admin)
        <div class="row">
            <div class="col s12">
                <ul class="tabs ">
                    <li class="tab col s3"><a class="active mdi mdi-24px mdi-account-multiple" href="#users"> Usuarios</a></li>
                    <li class="tab col s3 disabled"><a class="mdi mdi-24px mdi-comment-account-outline" href="#otras "> Solicitudes</a></li>
                    <li class="tab col s3 disabled"><a class="mdi mdi-24px mdi-account-star-variant" href="#otras"> Cuentas premium</a></li>
                    <li class="tab col s3 disabled"><a class="mdi mdi-24px mdi-account-settings" href="#otras"> Vendedores</a></li>
                    <li class="tab col s3 disabled"><a class="mdi mdi-24px mdi-square-inc-cash" href="#otras"> Precios</a></li>
                </ul>
            </div>
            <div class="col s12" id="users">
                <ul id="users_card" class=" collection with-header">
                    <li class="collection-header grey">
                        <h4 class="xm-card-title">Listado de usuarios</h4>
                        <p class="xm-card-date">Mostrando
                            : @if(count($users)>0 )

                                {{count($users)}} de  {{count($users)}}

                            @else
                                Sin resultados....
                            @endif
                        </p>
                    <li class="collection-item hide-on-small-only">
                        <div class="row ">
                            <div id="name_user" class="col l1 m4 s12 ">
                                <p class="collections-title hide-on-small-only">Usuario</p>

                            </div>
                            <div id="name_correo" class="col l2 m4 s12 ">
                                <p class="collections-title hide-on-small-only">Correo</p>

                            </div>
                            <div id="name_type" class="col l1 m4 s12 ">
                                <p class="collections-title hide-on-small-only">Tipo de Usuario</p>

                            </div>
                            <div id="name_fecha" class="col l2 m4 s12 ">
                                <p class="collections-title hide-on-small-only">Fecha de creación</p>

                            </div>
                            <div id="name_fecha" class="col l3 m4 s12 ">
                                <p class="collections-title hide-on-small-only">Acciones</p>

                            </div>
                        </div>
                    </li>
                    @if(count($users)>0)
                        @foreach($users as $user)
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col l1 m4 s12 ">
                                        <p class="collections-content ">{{$user->name}}</p>

                                    </div>
                                    <div class="col l2 m4 s12 ">
                                        <p class="collections-content ">{{$user->email}}</p>

                                    </div>
                                    <div class="col l1 m6 s12 ">
                                        <p class="collections-content  ">@if($user->is_admin)
                                                <span class="red-text"><i class="mdi mdi-24px mdi-account-key"></i></span>
                                            @else
                                                <i class="mdi mdi-24px mdi-account"></i>
                                            @endif</p>

                                    </div>
                                    <div class="col l2 m4 s12 ">
                                        <p class="collections-content ">{{$user->created_at}}</p>

                                    </div>
                                    <div class="col l3 m4 s12 ">
                                        <a data-position="left" data-delay="50" data-tooltip="Modificar usuario." class="tooltipped btn btn-primary btn-floating waves-effect mdi-24px mdi mdi-account-edit" href="{{ route('user.edit',[$user->id])}}"></a>
                                        <a data-position="right" data-delay="50" data-tooltip="Eliminar usuario." class="tooltipped btn btn-danger btn-floating waves-effect red  mdi-24px mdi mdi-account-minus"  href="{{ route('user.delete',[$user->id,])}}"></a>
                                    </div>
                                </div>

                            </li>

                            @endforeach

                            @endif

                            </li>
                </ul>
            </div>
            <div id="otras" class="col l6"><p>acciones administrador</p></div>

        </div>

    @else
        <div class="row">
            <div class="col s12">

                <ul id="moviles_card" class="collection with-header">

                    <li class="collection-header grey">
                        <h4 class="xm-card-title">Listado de moviles</h4>
                        <p class="xm-card-date">Última actualización
                            : @if(count($moviles)>1 )

                                {{$moviles[count($cant)-1]['updated_at']}} | Mostrando {{count($moviles)}}
                                de {{count($cant)}}
                            @elseif(count($moviles)==1)
                                {{$moviles[0]['updated_at']}} | Mostrando {{count($moviles)}}
                                de {{count($cant)}}
                            @else
                                Sin resultados....
                            @endif
                        </p>


                    </li>
                    <ul class="card-action-buttons">
                        {{--<li>--}}
                        {{--<a id="add_sol_btn" class="btn-floating tooltipped btn-large waves-effect waves-light orange"--}}
                        {{--data-position="left" data-delay="50" data-tooltip="Adicionar solicitud del movil que desea insertar." --}}{{--href="#modal_add"--}}{{--><i--}}
                        {{--class="material-icons">add</i></a>--}}
                        {{--</li>--}}
                        <li>
                            <a id="search_btn"
                               class="btn-floating tooltipped btn-large waves-effect waves-light blue"
                               data-position="left" data-delay="50" data-tooltip="Buscar móvil"
                               href="#modal_search"><i
                                        class="material-icons">search</i></a>
                        </li>

                        <li>
                            <a id="reload_btn"
                               class="btn-floating tooltipped btn-large waves-effect waves-light green"
                               data-position="left" data-delay="50" data-tooltip="Recargar"
                               href="{{ url('home') }}"><i
                                        class="material-icons">cached</i></a>
                        </li>
                    </ul>
                    <ul id="list_moviles">
                    @if(count($moviles) >0 )
                        @foreach($moviles as $movil)
                            <li  style="opacity: 0" class="collection-item avatar">
                                <img id="imagen" src="{{asset('xmovil/apk/XMOVIL/moviles/')}}/{{$movil->model}}.jpg"
                                     class="circle responsive-img valign pro">
                                <div class="row col l12 m12 s12">
                                    <div id="name_model" class="col l2 m3 s12 ">
                                        <p class="collections-title hide-on-small-only">DISPOSITIVO</p>
                                        <p class="collections-content"><b>Nombre:</b> {{$movil->name}}
                                        </p>
                                        <p class="collections-content "><b>modelo: </b>{{$movil->model}} |
                                            <b>Año:</b> {{$movil->lanzamiento}}  </p>

                                    </div>
                                    <div id="dimensiones" class="col l2 m2 s1 hide-on-med-and-down ">
                                        <p class="collections-title">TAMAÑO</p>
                                        <p class="collections-content"><b>Dimensiones: </b>{{$movil->dimensions}}
                                            mm
                                        </p>
                                        <p class="collections-content"><b>Peso: </b>{{$movil->peso}} g |
                                            <b>Grosor: </b>{{$movil->grosor}} mm </p>


                                    </div>
                                    <div id="pantalla_tpantalla_densidad" class="col l2 m4 s1 hide-on-small-only">
                                        <p class="collections-title">DISPLAY</p>
                                        <p class="collections-content"><b>Tipo:</b> {{$movil->tipopantalla}} </p>
                                        <p class="collections-content"><b>Tamaño: </b>{{$movil->pantalla}} in | <b>resolución:</b> {{$movil->dpi}}
                                            px</p>

                                    </div>
                                    <div id="sistema_version" class="col l2 m3 s1 hide-on-med-and-down">
                                        <p class="collections-title">PLATAFORMA</p>
                                        <p class="collections-content">
                                            <b>OS:</b> {{$movil->os}} {{$movil->vos}} </p>
                                        <p class="collections-content"><b>CPU:</b> {{$movil->procesador}}</p>
                                    </div>
                                    <div id="ram" class="col l1 m2 s1 hide-on-small-only">
                                        <p class="collections-title">MEMORIA</p>
                                        <p class="collections-content"><b>RAM:</b> {{$movil->ram}} GB</p>
                                        <p class="collections-content"><b>Interna:</b> {{$movil->internal}} GB </p>


                                    </div>
                                    <div id="camarad_camaraT" class="col l1 m1 s1 hide-on-med-and-down">
                                        <p class="collections-title">CÁMARA</p>
                                        <p class="collections-content"><b>Frontal:</b> {{$movil->camaraf}} MP</p>
                                        <p class="collections-content"><b>Trasera:</b> {{$movil->camarat}} MP</p>
                                    </div>
                                    <div id="bateria" class="col l1 m3 s1 hide-on-small-only ">
                                        <p class="collections-title">BATERÍA</p>
                                        <p class="collections-content"><b>Cantidad: </b>{{$movil->bateria}} mAh</p>
                                        <p><b>Dual-SIM:</b> @if($movil->dual =="on" )
                                                Si
                                            @else
                                                No
                                            @endif</p>
                                    </div>
                                    <div id="precio" class="col l1 m1 s1 hide-on-med-and-down">
                                        <p class="collections-title">PRECIO</p>
                                        <p class="collections-content"><b>Nuevo:</b> ${{$movil->precio}} CUC</p>
                                        <p><b>SD:</b> @if($movil->microsd =="on" || $movil->microsd =="1"  )
                                                SI
                                            @else
                                                No
                                            @endif</p>

                                    </div>


                                </div>
                            </li>
                        @endforeach
                    @else
                        <span class="collection-header info orange-text"><i
                                    class="material-icons medium">error_outline</i>  No existen datos que mostrar</span>
                    @endif

                    </ul>
                </ul>


            </div>
        </div>
        {{--Modal buscar--}}
        <div id="modal_search" class="modal">
            <form class="col s2" id="form_search" method="POST" action="{{ url('home/search') }}"
                  enctype="multipart/form-data">
                <div class="modal-content">
                    <h5><i class="material-icons">search</i>Buscar móvil</h5>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="autocomplete-input" name="name" type="text" class="autocomplete">
                            <input name="_token" type="hidden" value="{!! csrf_token() !!}"/>
                            <label for="autocomplete-input">Nombre</label>

                            @if ($errors->has('name'))
                                <span class="help-block orange-text">
                            <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <ul>

                        <li>
                            <button type="submit" id="aceptar_search"
                                    class="btn-flat modal-action waves-effect waves-green right">Aceptar
                            </button>

                        </li>

                        <li>
                            <a href="#!" id="cancelar _search"
                               class=" btn modal-action modal-close waves-effect waves-red red right">Cancelar</a>
                        </li>
                    </ul>


                </div>
            </form>

        </div>
        {{--Modals imagen --}}
        <div id="modal_img" class="modal">
            <div id="card_img" class="card-image waves-effect waves-block waves-light">
                <img id="imagen_card" class='img_card'>
            </div>
        </div>
    @endif

@endsection
