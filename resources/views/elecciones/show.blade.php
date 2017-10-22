@extends('layouts.base')

@section('titulo')
    <title>Sintrauvem - Datos de la elección</title>
@stop

@section('cabecera')
@include('layouts.header', ['tituloGrande' => 'Elecciones', 'subtituloGrande' => 'Datos de la elección', 'titulo' => 'Elecciones', 'subtitulo' => 'Datos de la elección', 'rutaTitulo' => 'elecciones.index'])
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
                    {!! Form::open(['route' => ['elecciones.destroy', $eleccion->id], 'method' =>'DELETE', 'id' => 'form-eliminar-eleccion', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar esta elección?\')']) !!}
                        <table id="datatable" class="table table-striped table-bordered">
                            <tr>
                                <th class="text-bold">Cédula: </th>
                                <td>{{ number_format($eleccion->nombreAfiliado->cedula, 0, '', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="text-bold">Nombre: </th>
                                <td>{{ $eleccion->nombreAfiliado->nombre }}</td>
                            </tr>
                            <tr>
                                <th class="text-bold">Apellido: </th>
                                <td>{{ $eleccion->nombreAfiliado->apellido }}</td>
                            </tr>
                            <tr>
                                <th class="text-bold">Centro: </th>
                                <td>{{ $eleccion->centro }}</td>
                            </tr>
                            <tr>
                                <th class="text-bold">Mesa: </th>
                                <td>{{ $eleccion->mesa }}</td>
                            </tr>
                            <tr>
                                <th class="text-bold">Acciones</th>
                                <td>
                                <button type="button" id="editar" name="editar" class="btn btn-success" onclick="document.location.href = '{{ URL::route('elecciones.edit', $eleccion->id) }}'"><i class="icon-pencil7 position-right"></i> Editar</button>
                                    <button type="button" id="eliminar" name="eliminar" class="btn btn-danger tooltip-error borrar" objeto="{{ $eleccion->id }}"  onclick="return confirmSubmit(document.forms['form-eliminar-eleccion'], '¿Está realmente seguro de eliminar esta elección?');"><i class="icon-trash position-right"></i> Eliminar</button>
                                </td>
                            </tr>
                        </table>
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