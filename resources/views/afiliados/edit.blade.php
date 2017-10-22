@extends('layouts.base')

@section('titulo')
    <title>Sintrauvem - Actualizar afiliado</title>
@stop

@section('cabecera')
@include('layouts.header', ['tituloGrande' => 'Afiliados', 'subtituloGrande' => 'Actualizar afiliado', 'titulo' => 'Afiliados', 'subtitulo' => 'Actualizar afiliado', 'rutaTitulo' => 'afiliados.index'])
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
                    {!! Form::model($afiliado,array('route' => ['afiliados.update', $afiliado->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'afiliadoForm')) !!}
                        @include('afiliados.Form.AfiliadoFormType')
                        @if(isset($carga))
                        @include('afiliados.Form.listaCarga', ['carga' => $carga])
                        @else
                        @include('afiliados.Form.listaCarga')
                        @endif
                        @include('layouts.botonesFormulario', ['nombreId' => 'afiliadoSubmit', 'cancelar' => URL::route('afiliados.index'), 'data' => 0, 'layer' => 'Actualizar'])
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