@extends('layouts.base')

@section('titulo')
    <title>Sintrauvem - Registrar votación</title>
@stop

@section('cabecera')
@include('layouts.header', ['tituloGrande' => 'Elecciones', 'subtituloGrande' => 'Registrar votación', 'titulo' => 'Elecciones', 'subtitulo' => 'Registrar votación', 'rutaTitulo' => 'elecciones.index'])
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
        <div class="col-md-12">
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
                    {!! Form::open(array('route' => 'elecciones.store', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'eleccionForm')) !!}
                        @include('elecciones.Form.EleccionesFormType')
                        @include('layouts.botonesFormulario', ['nombreId' => 'eleccionSubmit', 'cancelar' => URL::route('elecciones.index'), 'data' => 1, 'layer' => 'Guardar'])
                    {!! form::close() !!}
                </div>
            </div>
            <!-- /navbar component classes -->
        </div>
    </div>

@stop

@section('javascripts')
@stop