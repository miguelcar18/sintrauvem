@extends('layouts.base')

@section('titulo')
    <title>Sintrauvem - Datos del usuario</title>
@stop

@section('cabecera')
@include('layouts.header', ['tituloGrande' => 'Usuarios', 'subtituloGrande' => 'Datos del usuario', 'titulo' => 'Usuarios', 'subtitulo' => 'Datos del usuario', 'rutaTitulo' => 'usuarios.index'])
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
                    {!! Form::open(['route' => ['usuarios.destroy', $user->id], 'method' =>'DELETE', 'id' => 'form-eliminar-usuario', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar este usuario?\')']) !!}
                        <table id="datatable" class="table table-striped table-bordered">
                            <tr>
                                <th class="text-bold">Imagen: </th>
                                <td>
                                    @if($user->path == '')
                                    <img class="profile-user-img img-responsive" src="{{ asset('uploads/usuarios/unfile.png') }}" alt="{{ $user->name }} profile picture" width="100px" height="auto">
                                    @else
                                    <img class="profile-user-img img-responsive" src="{{ asset('uploads/usuarios/'.$user->path) }}" alt="{{ $user->name }} profile picture" width="100px" height="auto">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="text-bold">Nombre: </th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th class="text-bold">Rol: </th>
                                <td>
                                    @if($user->rol == 1)
                                    Secretario general
                                    @elseif($user->rol == 0)
                                    Invitado
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="text-bold">Nombre de usuario: </th>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <th class="text-bold">Email: </th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            @if($user->details != '')
                            <tr>
                                <th class="text-bold">Detalles: </th>
                                <td>{{ $user->details }}</td>
                            </tr>
                            @endif                         
                            <tr>
                                <th class="text-bold">Acciones</th>
                                <td>
                                    <button type="button" id="editar" name="editar" class="btn btn-success" onclick="document.location.href = '{{ URL::route('usuarios.edit', $user->id) }}'"><i class="icon-pencil7 position-right"></i> Editar</button>
                                    @if(Auth::user()->rol == 1)
                                    <button type="button" id="eliminar" name="eliminar" class="btn btn-danger tooltip-error borrar" objeto="{{ $user->id }}"  onclick="return confirmSubmit(document.forms['form-eliminar-usuario'], '¿Está realmente seguro de eliminar este usuario?');"><i class="icon-trash position-right"></i> Eliminar</button>
                                    @endif
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
<script type="text/javascript"></script>
@stop