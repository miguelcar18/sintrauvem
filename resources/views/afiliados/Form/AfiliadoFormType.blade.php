@if(isset($afiliado->pathCedula))
<div class="form-group">
    <label class="col-lg-2 control-label">Cédula:</label>
    <div class="col-lg-4">
    @if($afiliado->pathCedula != '')
        <img src="{{ asset('uploads/afiliados/'.$afiliado->pathCedula) }}" alt="" class="img img-thumbnail">
    @elseif($afiliado->pathCedula == '')
        <img src="{{ asset('assets/images/placeholder.jpg') }}" alt="" class="img img-thumbnail">
    @endif
    </div>
    <label class="col-lg-2 control-label">Imagen:</label>
    <div class="col-lg-4">
        @if($afiliado->pathImagen != '')
            <img src="{{ asset('uploads/afiliados/'.$afiliado->pathImagen) }}" alt="" class="img img-thumbnail">
        @elseif($afiliado->pathImagen == '')
            <img src="{{ asset('assets/images/placeholder.jpg') }}" alt="" class="img img-thumbnail">
        @endif
    </div>
</div>
@endif

<div class="form-group">
    <label class="col-lg-1 control-label">Nombres:</label>
    <div class="col-lg-3">
        {!! Form::text('nombre', null, array('class' => 'form-control col-md-7 col-xs-12', 'id' => 'nombre', 'placeholder' => 'Nombres', 'required' => 'required')) !!}
    </div>
    <label class="col-lg-1 control-label">Apellidos:</label>
    <div class="col-lg-3">
        {!! Form::text('apellido', null, array('class' => 'form-control col-md-7 col-xs-12', 'id' => 'apellido', 'placeholder' => 'Apellidos', 'required' => 'required')) !!}
    </div>
    <label class="col-lg-1 control-label">Cédula:</label>
    <div class="col-lg-3">
        {!! Form::text('cedula', null, array('class' => 'form-control col-md-7 col-xs-12', 'id' => 'cedula', 'placeholder' => 'Cédula', 'required' => 'required')) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-lg-1 control-label">Sexo:</label>
    <div class="col-lg-3">
        {!! Form::select('sexo', array('' => 'Seleccione', 'M' => 'Masculino', 'F' => 'Femenino'), null, $attributes = array('id' => 'sexo', 'class' => 'form-control', 'required' => 'required')) !!}
    </div>
    <label class="col-lg-1 control-label">Fecha nac.:</label>
    <div class="col-lg-3">
        @if(isset($afiliado->fechaNacimiento))
            <?php 
                $separarFecha =  explode('-', $afiliado->fechaNacimiento);
                $fechaNormal =  $separarFecha[2].'/'.$separarFecha[1].'/'.$separarFecha[0];
            ?>
            {!! Form::text('fechaNacimiento', $fechaNormal, array('class' => 'form-control col-md-7 col-xs-12 daterange-single', 'id' => 'fechaNacimiento', 'placeholder' => 'Fecha de nacimiento', 'required' => 'required')) !!}
        @else
            {!! Form::text('fechaNacimiento', null, array('class' => 'form-control col-md-7 col-xs-12 daterange-single', 'id' => 'fechaNacimiento', 'placeholder' => 'Fecha de nacimiento', 'required' => 'required')) !!}
        @endif
    </div>
    <label class="col-lg-1 control-label">Edad:</label>
    <div class="col-lg-3">
        {!! Form::input('number', 'edad', null, ['id' => 'edad', 'class' => 'form-control', 'placeholder' => 'Edad', 'required' => true, 'min' => 1]) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-lg-1 control-label">Tel. móvil:</label>
    <div class="col-lg-3">
        {!! Form::text('telefonoMovil', null, array('class' => 'form-control col-md-7 col-xs-12', 'id' => 'telefonoMovil', 'placeholder' => 'Ńúmero de teléfono móvil', 'required' => 'required')) !!}
    </div>
    <label class="col-lg-1 control-label">Tel. casa:</label>
    <div class="col-lg-3">
        {!! Form::text('telefonoCasa', null, array('class' => 'form-control col-md-7 col-xs-12', 'id' => 'telefonoCasa', 'placeholder' => 'Número de teléfono de casa', 'required' => 'required')) !!}
    </div>
    <label class="col-lg-1 control-label">Correo:</label>
    <div class="col-lg-3">
        {!! Form::email('correo', null, array('class' => 'form-control col-md-7 col-xs-12', 'id' => 'correo', 'placeholder' => 'Correo electrónico', 'required' => 'required')) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-lg-1 control-label">Cargo:</label>
    <div class="col-lg-3">
        {!! Form::select('cargo', $cargos, null, $attributes = array('id' => 'cargo', 'class' => 'form-control', 'required' => 'required')) !!}
    </div>
    <label class="col-lg-1 control-label">Fec. ingreso:</label>
    <div class="col-lg-3">
        @if(isset($afiliado->fechaIngreso))
            <?php 
                $separarFechados =  explode('-', $afiliado->fechaIngreso);
                $fechaNormaldos =  $separarFechados[2].'/'.$separarFechados[1].'/'.$separarFechados[0];
            ?>
            {!! Form::text('fechaIngreso', $fechaNormaldos, array('class' => 'form-control col-md-7 col-xs-12 daterange-single', 'id' => 'fechaIngreso', 'placeholder' => 'Fecha de ingreso', 'required' => 'required')) !!}
        @else
            {!! Form::text('fechaIngreso', null, array('class' => 'form-control col-md-7 col-xs-12 daterange-single', 'id' => 'fechaIngreso', 'placeholder' => 'Fecha de ingreso', 'required' => 'required')) !!}
        @endif
    </div>
    <label class="col-lg-1 control-label">Años servicio:</label>
    <div class="col-lg-3">
        {!! Form::input('number', 'aniosServicio', null, ['id' => 'aniosServicio', 'class' => 'form-control', 'placeholder' => 'Años de servicio', 'required' => true, 'min' => 0]) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-lg-1 control-label">Estado:</label>
    <div class="col-lg-3">
        {!! Form::select('status', array('' => 'Seleccione', 'Activo' => 'Activo', 'Pensionado' => 'Pensionado'), null, $attributes = array('id' => 'status', 'class' => 'form-control', 'required' => 'required')) !!}
    </div>
    <label class="col-lg-1 control-label">Dependencia:</label>
    <div class="col-lg-3">
        {!! Form::select('dependencia', array('' => 'Seleccione', 'Bienestar Estudiantil' => 'Bienestar Estudiantil', 'Correspondencia' => 'Correspondencia', 'Departamento De Mantenimiento' => 'Departamento De Mantenimiento', 'Ecsa' => 'Ecsa', 'Eica' => 'Eica', 'Escuela De Agronomía' => 'Escuela De Agronomía', 'Otro' => 'Otro', 'Servicios General ' => 'Servicios General ', 'Unidad De Cursos Básicos' => 'Unidad De Cursos Básicos', 'Unidad De Reproducción ' => 'Unidad De Reproducción ', 'Zootecnia' => 'Zootecnia'), null, $attributes = array('id' => 'dependencia', 'class' => 'form-control', 'required' => 'required')) !!}
    </div>
    <label class="col-lg-1 control-label">Fec. afiliación:</label>
    <div class="col-lg-3">
        @if(isset($afiliado->fechaAfiliacion))
            <?php 
                $separarFechatres =  explode('-', $afiliado->fechaAfiliacion);
                $fechaNormaltres =  $separarFechatres[2].'/'.$separarFechatres[1].'/'.$separarFechatres[0];
            ?>
            {!! Form::text('fechaAfiliacion', $fechaNormaltres, array('class' => 'form-control col-md-7 col-xs-12 daterange-single', 'id' => 'fechaAfiliacion', 'placeholder' => 'Fecha de afiliación', 'required' => 'required')) !!}
        @else
            {!! Form::text('fechaAfiliacion', null, array('class' => 'form-control col-md-7 col-xs-12 daterange-single', 'id' => 'fechaAfiliacion', 'placeholder' => 'Fecha de afiliación', 'required' => 'required')) !!}
        @endif
    </div>
</div>
<div class="form-group">
    <label class="col-lg-1 control-label">¿Cotiza en CAUDO?</label>
    <div class="col-lg-3">
        {!! Form::select('cotizaUdo', array('' => 'Seleccione', '1' => 'Si', '0' => 'No'), null, $attributes = array('id' => 'cotizaUdo', 'class' => 'form-control', 'required' => 'required')) !!}
    </div>
    <label class="col-lg-1 control-label">Cédula:</label>
    <div class="col-lg-3">
        {!! Form::file('fileCedula', $attributes = array('class' => 'form-control file-styled', 'id' => 'fileCedula', 'accept' => 'image/jpg,image/png,image/jpeg,image/gif')) !!}
    </div>
    <label class="col-lg-1 control-label">Foto de perfil:</label>
    <div class="col-lg-3">
        {!! Form::file('fileImagen', $attributes = array('class' => 'form-control file-styled', 'id' => 'fileImagen', 'accept' => 'image/jpg,image/png,image/jpeg,image/gif')) !!}
    </div>
</div>
