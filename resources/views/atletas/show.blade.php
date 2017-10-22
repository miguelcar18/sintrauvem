@extends('layouts.base')

@section('titulo')
    <title>Sintrauvem - Datos del atleta</title>
@stop

@section('cabecera')
@include('layouts.header', ['tituloGrande' => 'Atletas', 'subtituloGrande' => 'Datos del atleta', 'titulo' => 'Atletas', 'subtitulo' => 'Datos del atleta', 'rutaTitulo' => 'atletas.index'])
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
                    {!! Form::open(['route' => ['atletas.destroy', $atleta->id], 'method' =>'DELETE', 'id' => 'form-eliminar-atleta', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar este atleta?\')']) !!}
                        <table id="datatable" class="table table-striped table-bordered">
                            <tr>
                                <th class="text-bold">Cédula: </th>
                                <td>{{ number_format($atleta->nombreAfiliado->cedula, 0, '', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="text-bold">Nombre: </th>
                                <td>{{ $atleta->nombreAfiliado->nombre }}</td>
                            </tr>
                            <tr>
                                <th class="text-bold">Apellido: </th>
                                <td>{{ $atleta->nombreAfiliado->apellido }}</td>
                            </tr>
                            <tr>
                                <th class="text-bold">1era. disciplina: </th>
                                <td>{{ $atleta->nombreDisciplinaUno->nombre }}</td>
                            </tr>
                            <tr>
                                <th class="text-bold">2da. disciplina: </th>
                                <td>{{ $atleta->nombreDisciplinaDos->nombre }}</td>
                            </tr>
                            <tr>
                                <th class="text-bold">Acciones</th>
                                <td>
                                <button type="button" id="editar" name="editar" class="btn btn-success" onclick="document.location.href = '{{ URL::route('atletas.edit', $atleta->id) }}'"><i class="icon-pencil7 position-right"></i> Editar</button>
                                    <button type="button" id="eliminar" name="eliminar" class="btn btn-danger tooltip-error borrar" objeto="{{ $atleta->id }}"  onclick="return confirmSubmit(document.forms['form-eliminar-atleta'], '¿Está realmente seguro de eliminar este atleta?');"><i class="icon-trash position-right"></i> Eliminar</button>
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