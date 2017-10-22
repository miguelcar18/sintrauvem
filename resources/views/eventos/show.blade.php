@extends('layouts.base')

@section('titulo')
    <title>Sintrauvem - Datos del evento</title>
@stop

@section('cabecera')
@include('layouts.header', ['tituloGrande' => 'Eventos', 'subtituloGrande' => 'Datos del evento', 'titulo' => 'Eventos', 'subtitulo' => 'Datos del evento', 'rutaTitulo' => 'eventos.index'])
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
                    {!! Form::open(['route' => ['eventos.destroy', $evento->id], 'method' =>'DELETE', 'id' => 'form-eliminar-evento', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar este evento?\')']) !!}
                        <table id="datatable" class="table table-striped table-bordered">
                            <tr>
                                <th class="text-bold">Fecha: </th>
                                <td>{{ date_format(date_create($evento->fecha), 'd/m/Y') }}</td>
                            </tr>
                            <tr>
                                <th class="text-bold">Lugar: </th>
                                <td>{{ $evento->lugar }}</td>
                            </tr>
                            <tr>
                                <th class="text-bold">Tipo de torneo: </th>
                                <td>{{ $evento->tipoTorneo }}</td>
                            </tr>
                            <tr>
                                <th class="text-bold">Solicitud de transporte: </th>
                                <td>
                                    @if($evento->solicitudTransporte == '1')
                                    Si
                                    @elseif($evento->solicitudTransporte == '0')
                                    No
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="text-bold" style="vertical-align: top;">Disciplinas: </th>
                                <td>
                                    @if(isset($disciplinas))
                                    <ul>
                                    @foreach($disciplinas as $data)
                                        <li>{{ $data->nombreDisciplina->nombre }}</li>
                                    @endforeach
                                    </ul>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="text-bold">Acciones</th>
                                <td>
                                <button type="button" id="editar" name="editar" class="btn btn-success" onclick="document.location.href = '{{ URL::route('eventos.edit', $evento->id) }}'"><i class="icon-pencil7 position-right"></i> Editar</button>
                                    <button type="button" id="eliminar" name="eliminar" class="btn btn-danger tooltip-error borrar" objeto="{{ $evento->id }}"  onclick="return confirmSubmit(document.forms['form-eliminar-evento'], '¿Está realmente seguro de eliminar este evento?');"><i class="icon-trash position-right"></i> Eliminar</button>
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