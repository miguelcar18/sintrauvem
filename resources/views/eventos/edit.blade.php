@extends('layouts.base')

@section('titulo')
    <title>Sintrauvem - Actualizar evento</title>
@stop

@section('cabecera')
@include('layouts.header', ['tituloGrande' => 'Eventos', 'subtituloGrande' => 'Actualizar evento', 'titulo' => 'Eventos', 'subtitulo' => 'Actualizar evento', 'rutaTitulo' => 'eventos.index'])
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
                    {!! Form::model($evento,array('route' => ['eventos.update', $evento->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'eventoForm')) !!}
                        @include('eventos.Form.EventoFormType')
                        @if(isset($disciplinasRegistradas))
                        @include('eventos.Form.listaDisciplinas', ['disciplinas' => $disciplinas, 'disciplinasRegistradas' => $disciplinasRegistradas])
                        @else
                        @include('eventos.Form.listaDisciplinas', ['disciplinas' => $disciplinas])
                        @endif
                        @include('layouts.botonesFormulario', ['nombreId' => 'eventoSubmit', 'cancelar' => URL::route('eventos.index'), 'data' => 0, 'layer' => 'Actualizar'])
                    {!! form::close() !!}
                    </div>
                </div>
            <!-- /navbar component classes -->
        </div>
    </div>

@stop

@section('javascripts')
@stop