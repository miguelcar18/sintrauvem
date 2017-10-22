<h4 class="header-title m-t-0 text-center">Disciplinas</h4>
<div class="form-group">
    <label class="col-lg-2 control-label text-bold">Disciplinas:</label>
    <div class="col-lg-8">
        {!! Form::select('disciplina', $disciplinas, null, $attributes = array('id' => 'disciplina', 'class' => 'form-control')) !!}
    </div>
    <div class="col-lg-2">
        <button type="button" id="agregarFilaDisciplina" class="btn btn-primary btn-block" onClick="agregarDisciplina()"><i class="icon-plus2 position-right"></i></i> Agregar</button>
    </div>
</div>
<table class="table table-striped table-hover table-full-width table-condensed" id="tablaDisciplinas">
    <thead>
        <tr>
            <th class="col-sm-*" style="width:90%">Disciplina</th>
            <th class="col-sm-*" style="width:10%">Opción</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($disciplinasRegistradas))
        @foreach($disciplinasRegistradas as $data)
        <tr>
            <td>
                <input type="hidden" name="disciplinaA[]" id="disciplinaA[]" value="{{ $data->disciplina }}" />{{ ucfirst($data->nombreDisciplina->nombre) }}
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