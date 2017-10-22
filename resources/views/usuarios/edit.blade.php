@extends('layouts.base')

@section('titulo')
    <title>Sintrauvem - Editar usuario</title>
@stop

@section('cabecera')
@include('layouts.header', ['tituloGrande' => 'Usuarios', 'subtituloGrande' => 'Editar usuario', 'titulo' => 'Usuarios', 'subtitulo' => 'Editar usuario', 'rutaTitulo' => 'usuarios.index'])
@stop

@section('contenido')
    <!-- Registration form -->
    {!! Form::model($user, ['route' => ['usuarios.update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true, 'id' => 'form_user_edit']) !!}
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel registration-form">
                    <div class="panel-body">
                        <div class="text-center">
                            <h5 class="content-group-lg">Editar usuario</h5>
                        </div>
                        @include('usuarios.Form.UserEditFormType')
                        @include('layouts.botonesFormulario', ['nombreId' => 'usuarioSubmit', 'cancelar' => URL::route('usuarios.index'), 'data' => 0, 'layer' => 'Actualizar'])
                    </div>
                </div>
            </div>
        </div>
    {!! form::close() !!}
    <!-- /registration form -->
@stop

@section('javascripts')
<script type="text/javascript">
    // Styled file input
    $(".file-styled").uniform({
        fileDefaultHtml:"Ningún archivo seleccionado",
        wrapperClass: 'bg-teal-400',
        fileButtonHtml: '<i class="icon-googleplus5"></i>'
    });
</script>
@stop