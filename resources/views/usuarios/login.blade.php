<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Global stylesheets -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    @section('titulo')
    <title>Sintrauvem - Inicio de sesión</title>
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
                    {!! Form::open(array('route' => 'login', 'method' => 'post', 'id' => 'formLogin', 'name' => 'formLogin',  "class" => "form-validate")) !!}
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div class="icon-object" style="border-radius: 0">
                                    <img src="{{ asset('assets/images/logo.jpeg') }}" class="img img-responsive" width="300px" height="auto" />
                                </div>
                                <h5 class="content-group-lg">Inicio de sesión <small class="display-block">Ingrese sus credenciales</small></h5>
                            </div>
                            <div class="form-group has-feedback has-feedback-left">
                                {!! Form::text('username', null, $attributes = array('placeholder' => 'Ingrese usuario', 'class' => 'form-control', 'required' => 'required')) !!}
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>
                            <div class="form-group has-feedback has-feedback-left">
                                {!! Form::password('password', $attributes = array('placeholder' => 'Ingrese contraseña', 'class' => 'form-control', 'required' => 'required')) !!}
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>
                            <div class="form-group login-options">
                                <div class="row">
                                    <div class="col-sm-6  col-sm-offset-6 text-right">
                                        <a href="{{ URL::route('password.request') }}">¿Olvidó su contraseña?</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::button('Ingresar <i class="icon-circle-right2 position-right"></i>', $attributes = array('class' => 'btn bg-blue btn-block', 'id' => 'botonIngresar', 'type' => 'submit')) !!}
                            </div>
                            <div class="content-divider text-muted form-group"><span>¿No posees una cuenta?</span></div>
                            <a href="{{ URL::route('register') }}" class="btn bg-slate btn-block content-group">Registrate</a>
                        </div>
                    {!! form::close() !!}
                    <!-- /advanced login -->
                    @show
                    <!-- Footer -->
                    <div class="footer text-white">
                        &copy; 2017. <a href="#" class="text-white">Sintrauvem - SINDICATO DE TRABAJADORES UNIVERSITARIOS DE VENEZUELA DEL ESTADO MONAGAS</a>
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
    <script type="text/javascript" src="{{ asset('assets/js/pages/login_validation.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- /theme JS files -->
    @section('javascripts')
    @show
</body>
</html>
