<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Global stylesheets -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    @section('titulo')
    <title>Sintrauvem - Restablecer contraseña</title>
    @show
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    @section('estilos')
    @show
</head>
<body class="bg-slate-800">
    <!-- Page container -->
    <div class="page-container login-container">
        <!-- Page content -->
        <div class="page-content">
            <!-- Main content -->
            <div class="content-wrapper">
                <!-- Content area -->
                <div class="content">
                    @section('contenido')
                    <!-- Advanced login -->
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(array('route' => 'password.email', 'method' => 'post', 'id' => 'resetPasswordForm', 'name' => 'resetPasswordForm')) !!}
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div class="icon-object" style="border-radius: 0">
                                    <img src="{{ asset('assets/images/logo.jpeg') }}" class="img img-responsive" width="300px" height="auto" />
                                </div>
                                <h5 class="content-group-lg">Restablecer contaseña</h5>
                            </div>
                            <div class="form-group has-feedback has-feedback-left">
                                {!! Form::text('email', old('email'), $attributes = array('placeholder' => 'Ingrese email', 'class' => 'form-control', 'required' => 'required', 'id' => 'email')) !!}
                                <div class="form-control-feedback">
                                    <i class="icon-envelope text-muted"></i>
                                </div>
                            </div>
                            @if ($errors->has('email'))
                            <div class="form-group has-feedback has-feedback-left">
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            </div>
                            @endif

                            <div class="form-group">
                                {!! Form::button('Enviar <i class="icon-circle-right2 position-right"></i>', $attributes = array('class' => 'btn bg-blue btn-block', 'id' => 'botonIngresar', 'type' => 'submit')) !!}
                                <a href="{{ URL::route('login') }}" type="submit" class="btn btn-link"><i class="icon-arrow-left13 position-left"></i> Regresar al formulario de registro</a>
                            </div>
                        </div>
                    {!! form::close() !!}
                    <!-- /advanced login -->
                    @show
                    <!-- Footer -->
                    <div class="footer text-white">
                        &copy; 2017. <a href="#" class="text-white">Sintrauvem</a> por <a href="#" class="text-white" target="_blank">Universidad de Oriente Núcleo Monagas</a>
                    </div>
                    <!-- /footer -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/pnotify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/validation/validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/moment/moment.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/pickers/datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/switch.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/components_notifications_pnotify.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- /theme JS files -->

    @section('javascripts')
    @show
</body>
</html>
