<h4 class="header-title m-t-0 text-center">Carga Familiar</h4>
<div class="form-group">
    <label class="col-lg-1 control-label">Nombre:</label>
    <div class="col-lg-4">
        {!! Form::text('nombreRelacion', null, array('class' => 'form-control col-md-7 col-xs-12', 'id' => 'nombreRelacion', 'placeholder' => 'Nombre y apellido')) !!}
    </div>
    <label class="col-lg-1 control-label">Relación:</label>
    <div class="col-lg-4">
        {!! Form::select('relacion', array('' => 'Seleccione', 'madre' => 'Madre', 'padre' => 'Padre', 'hijo/a' => 'Hijo/a', 'esposo/a' => 'Esposo/a'), null, $attributes = array('id' => 'relacion', 'class' => 'form-control')) !!}
    </div>
    <div class="col-lg-2">
        <button type="button" id="agregarFila" class="btn btn-primary btn-block" onClick="agregarValor()"><i class="icon-plus2 position-right"></i></i> Agregar</button>
    </div>
</div>
<table class="table table-striped table-hover table-full-width table-condensed" id="tablaCargaFamiliar">
    <thead>
        <tr>
            <th class="col-sm-*" style="width:60%">Nombre</th>
            <th class="col-sm-*" style="width:30%">Relación</th>
            <th class="col-sm-*" style="width:10%">Opción</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($carga))
        @foreach($carga as $data)
        <tr>
            <td>
                <input type="hidden" name="nombreA[]" id="nombreA[]" value="{{ $data->nombre }}" /> {{ $data->nombre }}
            </td>
            <td>
                <input type="hidden" name="relacionA[]" id="relacionA[]" value="{{ $data->relacion }}" />{{ ucfirst($data->relacion) }}
            </td>
            <td>
                <button type="button" onclick="eliminarFila(this)" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
<br>