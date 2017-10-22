<hr>
<div class="text-center">
	<button type="button" id="editar" name="editar" class="btn btn-success" onclick="document.location.href = '{{ $editar }}'"><i class="icon-pencil7 position-right"></i> Editar</button>
	<button type="button" id="eliminar" name="eliminar" class="btn btn-danger tooltip-error borrar" objeto="{{ $idEliminar }}"  onclick="return confirmSubmit(document.forms['{{ $formEliminar }}'], '¿Está realmente seguro de eliminar {{ $finMensaje }}?');"><i class="icon-trash position-right"></i> Eliminar</button>
</div>