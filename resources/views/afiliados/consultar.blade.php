@extends('layouts.base')

@section('titulo')
    <title>Sintrauvem - Consultar nómina afiliados</title>
@stop

@section('cabecera')
@include('layouts.header', ['tituloGrande' => 'Afiliados', 'subtituloGrande' => 'Nómina', 'titulo' => 'Afiliados', 'subtitulo' => 'Nómina', 'rutaTitulo' => 'atletas.index'])
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
                    {!! Form::open(array('route' => 'atletas.store', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'atletaForm')) !!}
                        {!! Form::hidden('direccionConsulta', URL::route('afiliadosDireccionConsulta'), ['class' => 'form-control', 'id' => 'direccionConsulta']) !!}
                        <div class="form-group">
                            <label class="col-lg-2 col-lg-offset-4 control-label text-bold">Estado:</label>
                            <div class="col-lg-3">
                                {!! Form::select('consultaEstado', array('' => 'Seleccione', 'Activo' => 'Activo', 'Pensionado' => 'Pensionado'), null, $attributes = array('id' => 'consultaEstado', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-lg-offset-4 control-label text-bold">Dependencia:</label>
                            <div class="col-lg-3">
                                {!! Form::select('consultaDependencia', array('' => 'Seleccione', 'Bienestar Estudiantil' => 'Bienestar Estudiantil', 'Correspondencia' => 'Correspondencia', 'Departamento De Mantenimiento' => 'Departamento De Mantenimiento', 'Ecsa' => 'Ecsa', 'Eica' => 'Eica', 'Escuela De Agronomía' => 'Escuela De Agronomía', 'Otro' => 'Otro', 'Servicios General ' => 'Servicios General ', 'Unidad De Cursos Básicos' => 'Unidad De Cursos Básicos', 'Unidad De Reproducción ' => 'Unidad De Reproducción ', 'Zootecnia' => 'Zootecnia'), null, $attributes = array('id' => 'consultaDependencia', 'class' => 'form-control', 'required' => 'required')) !!}
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" id="afiliadoConsultar" name="afiliadoConsultar" class="btn btn-info" data='0'>Consultar <i class="icon-search4 position-right"></i></button>
                            <button type="button" id="cancelar" name="cancelar" class="btn btn-danger"  onclick="document.location.href = 'URL::route("afiliados.index")'"><i class="icon-cross2 position-right"></i> Cancelar</button>
                        </div>
                    {!! form::close() !!}
                    <div id="resultados">
                        <table class="table datatable-basic">
                            <thead>
                                <tr>
                                    <th>Cédula</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="text-center">
                            <button type="button" data-href="{{ URL::route('afiliadosDireccionReporte') }}" name="reporteAfiliados" id="reporteAfiliados" class="btn btn-secondary waves-effect" data-estado="-" data-dependencia="-"><i class="icon-printer position-right"></i> Imprimir</button>
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