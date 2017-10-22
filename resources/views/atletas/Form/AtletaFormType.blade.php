<div class="form-group">
    <label class="col-lg-1 col-lg-offset-3 control-label text-bold">Afiliado:</label>
    <div class="col-lg-4">
        {!! Form::hidden('direccion', URL::route('buscarAtleta'), ['class' => 'form-control', 'id' => 'direccion']) !!}
        {!! Form::select('afiliado', $afiliados, null, $attributes = array('id' => 'afiliado', 'class' => 'form-control', 'required' => 'required')) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-lg-1 col-lg-offset-3 control-label text-bold">Nombre:</label>
    <label class="col-lg-2 control-label" id="labelNombre">--</label>
    <label class="col-lg-1 control-label text-bold">Apellido:</label>
    <label class="col-lg-2 control-label" id="labelApellido">--</label>
</div>
<div class="form-group">
    <label class="col-lg-1 col-lg-offset-3 control-label text-bold">Cédula:</label>
    <label class="col-lg-2 control-label" id="labelCedula">--</label>
    <label class="col-lg-1 control-label text-bold">Sexo:</label>
    <label class="col-lg-2 control-label" id="labelSexo">--</label>
</div>
<div class="form-group">
    <label class="col-lg-1 col-lg-offset-3 control-label text-bold">Fecha de nacimiento:</label>
    <label class="col-lg-2 control-label" id="labelFechaNacimiento">--</label>
    <label class="col-lg-1 control-label text-bold">Edad:</label>
    <label class="col-lg-2 control-label" id="labelEdad">--</label>
</div>
<div class="form-group">
    <label class="col-lg-1 col-lg-offset-3 control-label text-bold">Teléfono móvil:</label>
    <label class="col-lg-2 control-label" id="labelTelefonoMovil">--</label>
    <label class="col-lg-1 control-label text-bold">Cargo:</label>
    <label class="col-lg-2 control-label" id="labelCargo">--</label>
</div>
<div class="form-group">
    <label class="col-lg-1 col-lg-offset-3 control-label text-bold">Disciplinas:</label>
    <div class="col-lg-2">
        {!! Form::select('disciplinaUno', $disciplinas, null, $attributes = array('id' => 'disciplinaUno', 'class' => 'form-control', 'required' => 'required')) !!}
    </div>
    <div class="col-lg-2">
        {!! Form::select('disciplinaDos', $disciplinas, null, $attributes = array('id' => 'disciplinaDos', 'class' => 'form-control')) !!}
    </div>
</div>