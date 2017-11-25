@extends('layouts.base')

@section('titulo')
    <title>Sintrauvem - Consultar nómina elecciones</title>
@stop

@section('cabecera')
@include('layouts.header', ['tituloGrande' => 'Elecciones', 'subtituloGrande' => 'Nómina elecciones', 'titulo' => 'Elecciones', 'subtitulo' => 'Nómina elecciones', 'rutaTitulo' => 'elecciones.index'])
@stop


@section('contenido')
    
    <?php $subtitulo="";?>
    @if(count($errors) > 0)

        <?php $subtitulo = "<ul>"; ?>
        @foreach($errors->all() as $error)
            <?php $subtitulo .= "<li>$error</li>"; ?>
        @endforeach
        <?php $subtitulo .= "</ul>";?>
            
        @include('Helpers.mensaje-error', ['titulo' => 'Error: ', 'subtitulo' => $subtitulo])

    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Navbar component classes -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('route' => 'elecciones.store', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'atletaForm')) !!}
                        {!! Form::hidden('direccionConsulta', URL::route('eleccionesDireccionConsulta'), ['class' => 'form-control', 'id' => 'direccionConsulta']) !!}
                        <div class="form-group">
                            <label class="col-lg-1 col-lg-offset-4 control-label text-bold">Centro:</label>
                            <div class="col-lg-3">
                                {!! Form::select('consultaCentro', array('' => 'Seleccione', 'Maturin' => 'Maturin', 'Jusepin' => 'Jusepin'), null, $attributes = array('id' => 'consultaCentro', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-1 col-lg-offset-4 control-label text-bold">Mesa:</label>
                            <div class="col-lg-3">
                                {!! Form::select('consultaMesa', array('' => 'Seleccione', '1' => 'Mesa 1', '2' => 'Mesa 2'), null, $attributes = array('id' => 'consultaMesa', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" id="eleccionConsultar" name="eleccionConsultar" class="btn btn-info" data='0'>Consultar <i class="icon-search4 position-right"></i></button>
                            <button type="button" id="cancelar" name="cancelar" class="btn btn-danger"  onclick="document.location.href = 'URL::route("elecciones.index")'"><i class="icon-cross2 position-right"></i> Cancelar</button>
                        </div>
                    {!! form::close() !!}
                    <div id="resultados">
                        <table class="table datatable-basic">
                            <thead>
                                <tr>
                                    <th>Cédula</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Centro</th>
                                    <th>Mesa</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="text-center">
                            <button type="button" data-href="{{ URL::route('eleccionesDireccionReporte') }}" name="reporteElecciones" id="reporteElecciones" class="btn btn-secondary waves-effect" data-disciplina="-" data-sexo="-"><i class="icon-printer position-right"></i> Imprimir</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /navbar component classes -->
        </div>
    </div>

@stop

@section('javascripts')
@stop