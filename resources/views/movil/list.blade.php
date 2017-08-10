@extends('layouts.movil')

@section('content')

    <div class="row">
        <div class="col s12">

            <ul id="moviles_card"  class="collection with-header">

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

                    @if (count($errors) > 0)
                        <script>

                            Materialize.toast('Ha ocurrido un error al tratar de insertar los datos.', 3000, 'rounded', function ()
                            {
                                $('#modal_add').openModal();
                            })

                        </script>
                    @endif
                    @if (Session::has('message'))
                        <script>
                            Materialize.toast("{{ Session::get('message') }}", 3500, 'rounded')
                        </script>

                    @endif

                </li>

                <ul id="btn_list" class="card-action-buttons">

                    <li >
                        <a id="search_btn" class="btn-floating tooltipped btn-large waves-effect waves-light blue"
                           data-position="left" data-delay="50" data-tooltip="Buscar móvil" href="#modal_search"><i
                                    class="material-icons">search</i></a>
                    </li>
                    <li>
                        <a id="add_btn"
                           class="btn-floating tooltipped btn-large waves-effect waves-light orange hide-on-small-only"
                           data-position="left" data-delay="50" data-tooltip="Adicionar móvil" href="#modal_add"><i
                                    class="material-icons">add</i></a>
                    </li>
                    <li>
                        <a id="reload_btn" class="btn-floating tooltipped btn-large waves-effect waves-light green"
                           data-position="left" data-delay="50" data-tooltip="Recargar"
                           href="{{ url('movil') }}"><i
                                    class="material-icons">cached</i></a>
                    </li>

                </ul>
                <ul id="list_moviles">
                    @if(count($moviles) >0 )
                        @foreach($moviles as $movil)
                            <li style="opacity: 0" class="collection-item avatar">
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
                                        <p class="collections-content"><b>Tamaño: </b>{{$movil->pantalla}} in | <b>Resolución:</b> {{$movil->dpi}}
                                            px
                                        </p>

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

    {{--Modals imagen --}}
    <div id="modal_img" class="modal">
        <div id="card_img" class="card-image waves-effect waves-block waves-light">
            <img id="imagen_card" class='img_card'>
        </div>
    </div>

    {{--Modal buscar--}}
    <div id="modal_search" class="modal">
        <form class="col s2" id="form_search" method="POST" action="{{ url('movil/search') }}"
              enctype="multipart/form-data">
            <div class="modal-content">
                <h5><i class="material-icons">search</i>Buscar móvil</h5>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="autocomplete-input" name="name" type="text"  class="autocomplete">
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
                        <a href="#!" id="cancelar_search"
                           class=" btn modal-action modal-close waves-effect waves-red red right">Cancelar</a>
                    </li>
                </ul>


            </div>
        </form>

    </div>
    {{--Modal adicionar--}}
    <div id="modal_add" class="modal">
        <form class="col s12" id="form_add" method="POST" action="{{ url('movil/add') }}"
              enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="modal-content">
                <h4><i class="material-icons">add</i>Insertar móvil</h4>

                <div class="row">
                    <div class="input-field col s12 m12 l3">
                        <input id="nombre" name="name" type="text"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="validate">
                        <label for="nombre">Nombre</label>

                        @if ($errors->has('name'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-field col s12 m12 l3">
                        <input id="modelo" name="model" type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="validate">
                        <label for="modelo">Modelo</label>
                        @if ($errors->has('model'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('model') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-field col s12 m12 l3">
                        <input id="anno" name="lanzamiento" type="text" class="validate">
                        <label for="anno">Fecha de lanzamiento</label>
                        @if ($errors->has('lanzamiento'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('lanzamiento') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-field col s12 m12 l3">
                        <input id="dimensiones" name="dimensions" type="text"
                               class="validate">
                        <label for="dimensiones">Tamaño</label>
                        @if ($errors->has('dimensions'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('dimensions') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l3">
                        <input id="precioU" name="grosor" type="text" class="validate">
                        <label for="precioU">Grosor</label>
                        @if ($errors->has('grosor'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('grosor') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-field col s12 m12 l3">
                        <input id="peso" name="peso" type="text" class="validate">
                        <label for="peso">Peso</label>
                        @if ($errors->has('peso'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('peso') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-field col s12 m12 l3">
                        <input id="tamanno" name="pantalla" type="text" class="validate">
                        <label for="tamanno">Tamaño de pantalla</label>
                        @if ($errors->has('pantalla'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('pantalla') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-field col s12 m12 l3">
                        <select name="tipopantalla">
                            <option value="" disabled selected>Tipo de pantalla</option>
                            <option value="AMOLED">AMOLED</option>
                            <option value="OPTIC AMOLED">OPTIC AMOLED</option>
                            <option value="P-OLED">P-OLED</option>
                            <option value="IPS">IPS</option>
                            <option value="IPS LCD">IPS LCD</option>
                            <option value="IPS NEO LCD">IPS NEO LCD</option>
                            <option value="LTPS IPS LCD">LTPS IPS LCD</option>
                            <option value="RETINA">RETINA</option>
                            <option value="SUPER AMOLED">SUPER AMOLED</option>
                            <option value="TFT">TFT</option>
                        </select>
                        <label>Tipo de pantalla</label>
                        @if ($errors->has('tipopantalla'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('tipopantalla') }}</strong>
                            </span>
                        @endif
                    </div>


                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l3">
                        <input id="densidad" name="dpi" type="text" class="validate">
                        <label for="densidad">Resolución</label>
                        @if ($errors->has('dpi'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('dpi') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-field col s12 m12 l3">
                        <input id="prosesador" name="procesador" type="text"
                               class="validate">
                        <label for="prosesador">Procesador</label>
                        @if ($errors->has('procesador'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('procesador') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-field col s12 m12 l3">
                        <select name="os">
                            <option value="" disabled selected>Seleccione el SO</option>
                            <option value="Android">Android</option>
                            <option value="IOS">IOS</option>
                            <option value="Ubuntu">Ubuntu</option>
                            <option value="Windows mobile">Windows mobile</option>
                        </select>
                        <label>Sistema operativo</label>
                        @if ($errors->has('os'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('os') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-field col s12 m12 l3">
                        <input id="version" name="vos" type="text"
                               class="validate">
                        <label for="version">Versión</label>
                        @if ($errors->has('vos'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('vos') }}</strong>
                            </span>
                        @endif
                    </div>


                </div>

                <div class="row">
                    <div class="input-field col s12 m12 l3">
                        <input id="almacenamiento" name="internal" type="text"
                               class="validate">
                        <label for="internal">Memoria interna</label>
                        @if ($errors->has('almacenamiento'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('internal') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-field col s12 m12 l3">
                        <input id="ram" name="ram" type="text"
                               class="validate">
                        <label for="ram">Memoria RAM</label>
                        @if ($errors->has('ram'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('ram') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-field col s12 m12 l3">
                        <input id="trasera" name="camarat" type="text" class="validate">
                        <label for="trasera">Cámara trasera</label>
                        @if ($errors->has('camaraT'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('camarat') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-field col s12 m12 l3">
                        <input id="frontal" name="camaraf" type="text" class="validate">
                        <label for="frontal">Cámara frontal</label>
                        @if ($errors->has('camaraF'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('camaraf') }}</strong>
                            </span>
                        @endif
                    </div>


                </div>
                <div class="row">

                    <div class="input-field col s12 m12 l3">
                        <input id="bateria" name="bateria" type="text" class="validate">
                        <label for="bateria">Batería</label>
                        @if ($errors->has('bateria'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('bateria') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-field col s12 m12 l3">
                        <input id="precioN" name="precio" type="text"
                               class="validate">
                        <label for="precioN">Precio del dispositivo nuevo</label>
                        @if ($errors->has('precio'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('precio') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="file-field input-field col s12 m12 l6">
                        <div class="btn right">
                            <span><i class="material-icons"> search</i></span>
                            <input id="img_val" type="file" name="imagen">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" name="img" placeholder="Subir imagen del dispositivo"
                                   type="text">
                        </div>
                        @if ($errors->has('img'))
                            <span class="help-block orange-text">
                            <strong>{{ $errors->first('img') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="switch col s12 m12 l6">
                        <label>
                            Sin microSD
                            <input type="checkbox" name="microsd">
                            <span class="lever"></span>
                            microSD
                        </label>
                    </div>
                    <div class="switch col s12 m12 l6">
                        <label>
                            Simple-SIM
                            <input type="checkbox" name="dual">
                            <span class="lever"></span>
                            DUAL-SIM
                        </label>
                    </div>
                    <input type="hidden" name="aplicar">


                </div>


            </div>
            <div class="modal-footer">
                <ul>

                    <li>
                        <button type="submit" id="aceptar"
                                class="btn-flat modal-action waves-effect waves-green right mdi mdi-24px mdi-check"> Aceptar
                        </button>

                    </li>
                    {{--<li class="corregirBtn">--}}
                    {{--<button id="aplicar"--}}
                    {{--class="btn-flat modal-action waves-effect waves-green right mdi mdi-24px mdi-check-all"> Aplicar--}}
                    {{--</button>--}}
                    {{--</li>--}}

                    <li>
                        <a href="#!" type="reset" id="cancelar"
                           class=" btn modal-action modal-close waves-effect waves-red red right mdi mdi-24px mdi-close">Cancelar</a>
                    </li>
                </ul>


            </div>
        </form>
    </div>


    </div>
@endsection
