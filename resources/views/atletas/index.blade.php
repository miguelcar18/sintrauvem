@extends('layouts.base')

@section('titulo')
    <title>Sintrauvem - Atletas</title>
@stop

@section('cabecera')
@include('layouts.header', ['tituloGrande' => 'Atletas', 'titulo' => 'Atletas', 'rutaTitulo' => 'atletas.index'])
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
                <div class="panel-body"></div>
                <table class="table datatable-basic">
                    <thead>
                        <tr>
                            <th>Cédula</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Primera Disciplina</th>
                            <th>Segunda Disciplina</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($atletas as $atleta)
                        <tr>
                            <td>{{ number_format($atleta->nombreAfiliado->cedula, 0, '', '.') }}</td>
                            <td>{{ $atleta->nombreAfiliado->nombre }}</td>
                            <td>{{ $atleta->nombreAfiliado->apellido }}</td>
                            <td>{{ $atleta->nombreDisciplinaUno->nombre }}</td>
                            <td>{{ $atleta->nombreDisciplinaDos->nombre }}</td>
                            <td class="text-center" style="padding: 1px">
                                <a href="{{ URL::route('atletas.show', $atleta->id) }}" class="btn btn-primary btn-icon" title="Ver {{ $atleta->nombreAfiliado->cedula }}">
                                    <i class="icon-eye"></i>
                                </a>
                                <a href="{{ URL::route('atletas.edit', $atleta->id) }}" class="btn btn-warning btn-icon" title="Editar {{ $atleta->nombreAfiliado->cedula }}">
                                    <i class="icon-pencil7"></i>
                                </a>
                                <a href="#" data-id="{{ $atleta->id }}" class="btn btn-danger btn-icon tooltip-error borrar-afiliado" data-rel="tooltip" title="Eliminar {{ $atleta->nombreAfiliado->cedula }}" objeto="{{ $atleta->id }}">
                                    <i class="icon-cancel-square"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! Form::open(array('route' => array('atletas.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) !!}
                {!! Form::close() !!}
            </div>
            <!-- /navbar component classes -->
        </div>
    </div>

@stop

@section('javascripts')
    <script>
        $(function () {
            @if(Session::has('message'))
                var mensaje1 = "{{ Session::get('message') }}";
                swal("¡Eliminado!", mensaje1, "success");
            @endif

            if ($('.tooltip-error').length) {
               $('.tooltip-error').click(function (e) {
                    e.preventDefault();
                    var message = "¿Está realmente seguro(a) de eliminar este atleta?";
                    var id = $(this).data('id');
                    var form = $('#form-delete');
                    var action = form.attr('action').replace('USER_ID', id);
                    var row =  $(this).parents('tr');
                    swal({
                        title: message,
                        //text: "You will not be able to recover this imaginary file!",
                        type: "warning",
                        showCancelButton: true,
                        cancelButtonClass: 'btn-secondary waves-effect',
                        confirmButtonClass: 'btn-warning',
                        confirmButtonText: "Si",
                        cancelButtonText: "No",
                        closeOnConfirm: false
                    }, function () {
                        row.fadeOut(1000);
                        $.post(action, form.serialize(), function(result) {
                            if (result.success) {
                                row.delay(1000).remove();
                                swal("¡Eliminado!", result.msg, "success");                
                            } 
                            else 
                                row.show();
                        }, 'json');
                    });
                });
            }
        });
    </script>
@stop