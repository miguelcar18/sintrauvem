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
    <label class="col-lg-1 col-lg-offset-3 control-label text-bold">Centro:</label>
    <div class="col-lg-2">
        {!! Form::select('centro', array('' => 'Seleccione', 'Maturin' => 'Maturin', 'Jusepin' => 'Jusepin'), null, $attributes = array('id' => 'centro', 'class' => 'form-control', 'required' => 'required')) !!}
    </div>
    <label class="col-lg-1 control-label text-bold">Mesa:</label>
    <div class="col-lg-2">
        {!! Form::select('mesa', array('' => 'Seleccione', '1' => 'Mesa 1', '2' => 'Mesa 2'), null, $attributes = array('id' => 'mesa', 'class' => 'form-control', 'required' => 'required')) !!}
    </div>
</div>