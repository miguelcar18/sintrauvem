@extends('layouts.base')

@section('titulo')
    <title>Sintrauvem - Datos del afiliado</title>
@stop

@section('cabecera')
@include('layouts.header', ['tituloGrande' => 'Afiliados', 'subtituloGrande' => 'Datos del afiliado', 'titulo' => 'Afiliados', 'subtitulo' => 'Datos del afiliado', 'rutaTitulo' => 'afiliados.index'])
@stop


@section('contenido')
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
                    {!! Form::open(array('route' => 'afiliados.store', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'afiliadoForm')) !!}
                    {!! Form::open(['route' => ['afiliados.destroy', $afiliado->id], 'method' =>'DELETE', 'id' => 'form-eliminar-afiliado', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar este afiliado?\')']) !!}
                        @include('afiliados.Form.AfiliadoLabelType', ['afiliado' => $afiliado])
                        @include('afiliados.Form.listaCargaMostrar', ['carga' => $carga])
                        @include('layouts.botonesFormularioMostrar', ['editar' => URL::route('afiliados.edit', $afiliado->id), 'idEliminar' => $afiliado->id, 'formEliminar' => 'form-eliminar-afiliado', 'finMensaje' => 'este afiliado'])
                    {!! form::close() !!}
                </div>
            </div>
            <!-- /navbar component classes -->
        </div>
    </div>

@stop

@section('javascripts')
<script type="text/javascript">
    
</script>
@stop