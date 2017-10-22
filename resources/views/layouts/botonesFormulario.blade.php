<div class="text-center">
	<button type="submit" id="{{ $nombreId }}" name="{{ $nombreId }}" class="btn btn-success" data='{{ $data }}'>{{ $layer }} <i class="icon-checkmark position-right"></i></button>
	<button type="button" id="cancelar" name="cancelar" class="btn btn-danger"  onclick="document.location.href = '{{ $cancelar }}'"><i class="icon-cross2 position-right"></i> Cancelar</button>
</div>