@extends('layouts.base')

@section('titulo')
    <title>Sintrauvem - Ver nómina</title>
@stop

@section('cabecera')
@include('layouts.header', ['tituloGrande' => 'Afiliados', 'titulo' => 'Afiliados', 'rutaTitulo' => 'afiliados.index'])
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
                            <th>Cargo</th>
                            <th>Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($afiliados as $afiliado)
                        <tr>
                            <td>{{ number_format($afiliado->cedula, 0, '', '.') }}</td>
                            <td>{{ $afiliado->nombre }}</td>
                            <td>{{ $afiliado->apellido }}</td>
                            <td>{{ $afiliado->nombreCargo->nombre }}</td>
                            <td>
                                @if($afiliado->status == "Activo")
                                    <span class="label label-success">Activo</span>
                                @elseif($afiliado->status == "Pensionado")
                                    <span class="label label-warning">Pensionado</span>
                                @endif
                            </td>
                            <td class="text-center" style="padding: 1px">
                                <a href="{{ URL::route('afiliados.show', $afiliado->id) }}" class="btn btn-primary btn-icon" title="Ver {{ $afiliado->cedula }}">
                                    <i class="icon-eye"></i>
                                </a>
                                <a href="{{ URL::route('afiliados.edit', $afiliado->id) }}" class="btn btn-warning btn-icon" title="Editar {{ $afiliado->cedula }}">
                                    <i class="icon-pencil7"></i>
                                </a>
                                <a href="#" data-id="{{ $afiliado->id }}" class="btn btn-danger btn-icon tooltip-error borrar-afiliado" data-rel="tooltip" title="Eliminar {{ $afiliado->cedula }}" objeto="{{ $afiliado->id }}">
                                    <i class="icon-cancel-square"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! Form::open(array('route' => array('afiliados.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) !!}
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
                setTimeout(function () {
                    var mensaje1 = "{{ Session::get('message') }}";
                    swal("¡Eliminado!", mensaje1, "success");
                }, 10);
            @endif

            if ($('.tooltip-error').length) {
               $('.tooltip-error').click(function (e) {
                    e.preventDefault();
                    var message = "¿Está realmente seguro(a) de eliminar este afiliado?";
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