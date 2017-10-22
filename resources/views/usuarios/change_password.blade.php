@extends('layouts.base')

@section('titulo')
    <title>Sintrauvem - Cambiar contraseña</title>
@stop

@section('cabecera')
@include('layouts.header', ['tituloGrande' => 'Usuarios', 'subtituloGrande' => 'Cambiar contraseña', 'titulo' => 'Usuarios', 'subtitulo' => 'Cambiar contraseña', 'rutaTitulo' => 'usuarios.index'])
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
        <div class="col-md-6 col-md-offset-3">
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
                    {!! Form::open(array('route' => 'postChangePassword', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'passwordForm')) !!}
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Contraseña actual:</label>
                            <div class="col-lg-9">
                                {!! Form::password('password_actual', array('class' => 'form-control col-md-7 col-xs-12', 'id' => 'password_actual', 'placeholder' => 'Contraseña actual', 'required' => 'required')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Contraseña nueva:</label>
                            <div class="col-lg-9">
                                {!! Form::password('password', array('class' => 'form-control col-md-7 col-xs-12', 'id' => 'password', 'placeholder' => 'Contraseña nueva', 'required' => 'required')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Repetir contraseña:</label>
                            <div class="col-lg-9">
                                {!! Form::password('password_confirmation', array('class' => 'form-control col-md-7 col-xs-12', 'id' => 'password_confirmation', 'placeholder' => 'Repita contraseña', 'data-validate-linked' => 'password', 'required' => 'required')) !!}
                            </div>
                        </div>
                        @include('layouts.botonesFormulario', ['nombreId' => 'passwordSubmit', 'cancelar' => URL::route('usuarios.index'), 'data' => 1, 'layer' => 'Guardar'])
                    {!! form::close() !!}
                    </div>
                </div>
            <!-- /navbar component classes -->
        </div>
    </div>

@stop