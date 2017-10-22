<!-- Main navbar -->
<div class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::route('principal') }}" style="padding: 0 20px">
			<img src="{{ asset('assets/images/logo.jpeg') }}" alt="" style="height: 44px">
		</a>
		<ul class="nav navbar-nav pull-right visible-xs-block">
			<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
		</ul>
	</div>
	<div class="navbar-collapse collapse" id="navbar-mobile">
		<ul class="nav navbar-nav">
			<li class="">
				<a href="{{ URL::route('principal') }}">
					<i class="icon-home position-left"></i> Inicio
				</a>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-cash2 position-left"></i> Nómina <span class="caret"></span>
				</a>

				<ul class="dropdown-menu dropdown-menu-right">
					<li><a href="{{ URL::route('afiliados.index') }}"></i> Ver nómina</a></li>
					<li><a href="{{ URL::route('afiliados.create') }}"></i> Agregar afiliado</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-reading position-left"></i> Secretaría deportes <span class="caret"></span>
				</a>

				<ul class="dropdown-menu dropdown-menu-right">
					<li class="dropdown-submenu">
						<a href="#">Disciplinas</a>
						<ul class="dropdown-menu">
							<li><a href="{{ URL::route('disciplinas.index') }}"></i> Listado de disciplinas</a></li>
							<li><a href="{{ URL::route('disciplinas.create') }}"></i> Agregar disciplina</a></li>
						</ul>
					</li>
					<li class="dropdown-submenu">
						<a href="#">Atletas</a>
						<ul class="dropdown-menu">
							<li><a href="{{ URL::route('atletas.consultar') }}"></i> Nómina deportiva</a></li>
							<li><a href="{{ URL::route('atletas.index') }}"></i> Listado de atletas</a></li>
							<li><a href="{{ URL::route('atletas.create') }}"></i> Agregar atleta</a></li>
						</ul>
					</li>
					<li class="dropdown-submenu">
						<a href="#">Eventos</a>
						<ul class="dropdown-menu">
							<li><a href="{{ URL::route('eventos.index') }}"></i> Listado de eventos</a></li>
							<li><a href="{{ URL::route('eventos.create') }}"></i> Agregar evento</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-list-unordered position-left"></i> Elecciones <span class="caret"></span>
				</a>

				<ul class="dropdown-menu dropdown-menu-right">
					<li><a href="{{ URL::route('elecciones.create') }}">Nómina</a></li>
					<li><a href="{{ URL::route('elecciones.index') }}">Listado de votación</a></li>
				</ul>
			</li>
			@if(Auth::user()->rol == 1)
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-users4 position-left"></i> Usuarios <span class="caret"></span>
				</a>

				<ul class="dropdown-menu dropdown-menu-right">
					<li><a href="{{ URL::route('usuarios.index') }}">Listar usuarios</a></li>
					<li><a href="{{ URL::route('usuarios.create') }}">Agregar usuario</a></li>
				</ul>
			</li>
			@endif
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown dropdown-user">
				<a class="dropdown-toggle" data-toggle="dropdown">
					@if(Auth::user()->path == '')
					<img src="{{ asset('uploads/usuarios/unfile.png') }}" alt="{{ Auth::user()->name }} profile picture" />
					@else
					<img src="{{ asset('uploads/usuarios/'.Auth::user()->path) }}" alt="{{ Auth::user()->name }} profile picture" />
					@endif
					<span>{{ Auth::user()->name }}</span>
					<i class="caret"></i>
				</a>
				<ul class="dropdown-menu dropdown-menu-right">
					<li><a href="{{ URL::route('usuarios.show', Auth::user()->id) }}"><i class="icon-eye"></i> Ver perfil</a></li>
					<li><a href="{{ URL::route('change_password') }}"><i class="icon-lock"></i> Cambiar contraseña</a></li>
					<li><a href="{{ URL::route('logout') }}"><i class="icon-switch2"></i> Salir</a></li>
				</ul>
			</li>
			<li>
				<a class="navbar-brand" href="{{ URL::route('principal') }}" style="padding: 0 20px">
				<img src="{{ asset('assets/images/logo_udo.png') }}" alt="" style="height: 44px">
				</a>
			</li>
		</ul>
	</div>
</div>
<!-- /main navbar -->