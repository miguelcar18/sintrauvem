<!-- Page header -->
<div class="page-header">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">{{ $tituloGrande }}</span> @if(isset($subtituloGrande)) <i class="icon-minus2"></i> {{ $subtituloGrande }} @endif</h4>
		</div>
	</div>
	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li><a href="{{ URL::route('principal') }}"><i class="icon-home2 position-left"></i> Panel de inicio</a></li>
			@if(isset($titulo))
			<li><a @if(isset($subtitulo)) href='{{ URL::route("$rutaTitulo") }}' @else class="active" @endif>{{ $titulo }}</a></li>
			@endif
			@if(isset($subtitulo))
			<li class="active">{{ $subtitulo }}</li>
			@endif
		</ul>	
	</div>
</div>
<!-- /page header -->