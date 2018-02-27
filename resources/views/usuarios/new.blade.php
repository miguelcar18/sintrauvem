@extends('layouts.base')

@section('titulo')
    <title>Sintrauvem - Agregar usuario</title>
@stop

@section('cabecera')
@include('layouts.header', ['tituloGrande' => 'Usuarios', 'subtituloGrande' => 'Agregar usuario', 'titulo' => 'Usuarios', 'subtitulo' => 'Agregar usuario', 'rutaTitulo' => 'usuarios.index'])
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
                    {!! Form::open(array('route' => 'usuarios.store', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'form_user')) !!}
                        @include('usuarios.Form.RegisterFormType')
                        @include('layouts.botonesFormulario', ['nombreId' => 'usuarioSubmit', 'cancelar' => URL::route('usuarios.index'), 'data' => 1, 'layer' => 'Guardar'])
                    {!! form::close() !!}
                </div>
            </div>
            <!-- /navbar component classes -->
        </div>
    </div>

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