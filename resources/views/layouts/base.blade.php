<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		@section('titulo')
		<title>Sintrauvem - Inicio</title>
		@show
		<!-- Global stylesheets -->
		<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
		{{-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css"> --}}
		<link href="{{ asset('assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style1.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/buttons.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css">
        {{--<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />--}}

		<!-- /global stylesheets -->

		@section('estilos')
		@show
	</head>
	<body>
		@include('layouts.navbar')
		<!-- Page container -->
		<div class="page-container">
			<!-- Page content -->
			<div class="page-content">
				<!-- Main content -->
				<div class="content-wrapper">
				{{--
					@include('layouts.header', ['tituloGrande' => 'Panel de inicio', 'subtituloGrande' => 'On Click', 'titulo' => 'Horizontal Nav', 'subtitulo' => 'On Click'])
				--}}
				@section('cabecera')
				@include('layouts.header', ['tituloGrande' => 'Panel de inicio'])
				@show
					<!-- Content area -->
					<div class="content">
						@section('contenido')
						<!-- Navbar component classes -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<div class="heading-elements">
									<ul class="icons-list">
										<li><a data-action="close"></a></li>
									</ul>
								</div>
							</div>
							<div class="panel-body text-center">
								<img src="{{ asset('assets/images/logo.jpeg') }}" alt="" style="padding: 65px">
							</div>
						</div>
						<!-- /navbar component classes -->
						@show
						@include('layouts.footer')
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
		<script type="text/javascript" src="{{ asset('assets/js/plugins/ui/prism.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/plugins/ui/moment/moment.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/plugins/pickers/datepicker.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/pages/form_layouts.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/pages/datatables_basic.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>

		<!-- Sweet Alert js -->
        <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-sweetalert/sweet-alert.min.js') }}"></script>

		@section('javascripts')
		@show
	</body>
</html>
