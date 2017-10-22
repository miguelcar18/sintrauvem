@extends('layouts.base')

@section('titulo')
    <title>Sintrauvem - Datos de la disciplina</title>
@stop

@section('cabecera')
@include('layouts.header', ['tituloGrande' => 'Disciplinas', 'subtituloGrande' => 'Datos de la disciplina', 'titulo' => 'Disciplinas', 'subtitulo' => 'Datos de la disciplina', 'rutaTitulo' => 'disciplinas.index'])
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
                    {!! Form::open(['route' => ['disciplinas.destroy', $disciplina->id], 'method' =>'DELETE', 'id' => 'form-eliminar-disciplina', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar esta disciplina?\')']) !!}
                        <table id="datatable" class="table table-striped table-bordered">
                            <tr>
                                <th class="text-bold">Nombre: </th>
                                <td>{{ $disciplina->nombre }}</td>
                            </tr>
                            <tr>
                                <th class="text-bold">Acciones</th>
                                <td>
                                <button type="button" id="editar" name="editar" class="btn btn-success" onclick="document.location.href = '{{ URL::route('disciplinas.edit', $disciplina->id) }}'"><i class="icon-pencil7 position-right"></i> Editar</button>
                                    <button type="button" id="eliminar" name="eliminar" class="btn btn-danger tooltip-error borrar" objeto="{{ $disciplina->id }}"  onclick="return confirmSubmit(document.forms['form-eliminar-disciplina'], '¿Está realmente seguro de eliminar esta disciplina?');"><i class="icon-trash position-right"></i> Eliminar</button>
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