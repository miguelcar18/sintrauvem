@extends('usuarios.login')

@section('titulo')
    <title>Sintrauvem - Registro de usuario</title>
@stop

@section('contenido')

    <!-- Registration form -->
    {!! Form::open(array('route' => 'usuarios.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true, 'id' => 'form_user')) !!}
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel registration-form">
                    <div class="panel-body">
                        <div class="text-center">
                            <div class="icon-object" style="border-radius: 0">
                                <img src="{{ asset('assets/images/logo.jpeg') }}" class="img img-responsive" width="300px" height="auto" />
                            </div>
                            <h5 class="content-group-lg">Crear cuenta</h5>
                        </div>
                        @include('usuarios.Form.RegisterFormType')
                        <div class="text-right">
                            <a href="{{ URL::route('login') }}" type="submit" class="btn btn-link"><i class="icon-arrow-left13 position-left"></i> Regresar al formulario de registro</a>
                            <button type="submit" id="usuarioSubmit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10" data='1'><b><i class="icon-plus3"></i></b> Crear cuenta</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! form::close() !!}
    <!-- /registration form -->
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