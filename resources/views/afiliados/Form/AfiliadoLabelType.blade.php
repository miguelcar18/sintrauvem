<div class="form-group">
    <label class="col-lg-2 control-label text-bold">Cédula:</label>
    <div class="col-lg-4">
    @if($afiliado->pathCedula != '')
        <img src="{{ asset('uploads/afiliados/'.$afiliado->pathCedula) }}" alt="" class="img img-thumbnail">
    @elseif($afiliado->pathCedula == '')
        <img src="{{ asset('assets/images/placeholder.jpg') }}" alt="" class="img img-thumbnail">
    @endif
    </div>
    <label class="col-lg-2 control-label text-bold">Imagen:</label>
    <div class="col-lg-4">
        @if($afiliado->pathImagen != '')
            <img src="{{ asset('uploads/afiliados/'.$afiliado->pathImagen) }}" alt="" class="img img-thumbnail">
        @elseif($afiliado->pathImagen == '')
            <img src="{{ asset('assets/images/placeholder.jpg') }}" alt="" class="img img-thumbnail">
        @endif
    </div>
</div>
<div class="form-group">
    <label class="col-lg-1 control-label text-bold">Nombres:</label>
    <label class="col-lg-3 control-label">{{ $afiliado->nombre }}</label>
    <label class="col-lg-1 control-label text-bold">Apellidos:</label>
    <label class="col-lg-3 control-label">{{ $afiliado->apellido }}</label>
    <label class="col-lg-1 control-label text-bold">Cédula:</label>
    <label class="col-lg-3 control-label">{{ number_format($afiliado->cedula, 0, '', '.') }}</label>
</div>
<div class="form-group">
    <label class="col-lg-1 control-label text-bold">Sexo:</label>
    <label class="col-lg-3 control-label">
        @if($afiliado->sexo == 'M')
        Masculino
        @elseif($afiliado->sexo == 'F')
        Femenino
        @endif
    </label>
    <label class="col-lg-1 control-label text-bold">Fecha nac.:</label>
    <?php 
        $separarFecha =  explode('-', $afiliado->fechaNacimiento);
        $fechaNormal =  $separarFecha[2].'/'.$separarFecha[1].'/'.$separarFecha[0];
    ?>
    <label class="col-lg-3 control-label">{{ $fechaNormal }}</label>
    <label class="col-lg-1 control-label text-bold">Edad:</label>
    <label class="col-lg-3 control-label">{{ $afiliado->edad }}</label>
</div>
<div class="form-group">
    <label class="col-lg-1 control-label text-bold">Tel. móvil:</label>
    <label class="col-lg-3 control-label">{{ $afiliado->telefonoMovil }}</label>
    <label class="col-lg-1 control-label text-bold">Tel. casa:</label>
    <label class="col-lg-3 control-label">{{ $afiliado->telefonoCasa }}</label>
    <label class="col-lg-1 control-label text-bold">Correo:</label>
    <label class="col-lg-3 control-label">{{ $afiliado->correo }}</label>
</div>
<div class="form-group">
    <label class="col-lg-1 control-label text-bold">Cargo:</label>
    <label class="col-lg-3 control-label">{{ $afiliado->nombreCargo->nombre }}</label>
    <label class="col-lg-1 control-label text-bold">Fec. ingreso:</label>
    <?php 
        $separarFechados =  explode('-', $afiliado->fechaIngreso);
        $fechaNormaldos =  $separarFechados[2].'/'.$separarFechados[1].'/'.$separarFechados[0];
    ?>
    <label class="col-lg-3 control-label">{{ $fechaNormaldos }}</label>
    <label class="col-lg-1 control-label text-bold">Años servicio:</label>
    <label class="col-lg-3 control-label">{{ $afiliado->aniosServicio }}</label>
</div>
<div class="form-group">
    <label class="col-lg-1 control-label text-bold">Estado:</label>
    <label class="col-lg-3 control-label">{{ $afiliado->status }}</label>
    <label class="col-lg-1 control-label text-bold">Dependencia:</label>
    <label class="col-lg-3 control-label">{{ $afiliado->dependencia }}</label>
    <label class="col-lg-1 control-label text-bold">Fec. afiliación:</label>
    <?php 
        $separarFechatres =  explode('-', $afiliado->fechaAfiliacion);
        $fechaNormaltres =  $separarFechatres[2].'/'.$separarFechatres[1].'/'.$separarFechatres[0];
    ?>
    <label class="col-lg-3 control-label">{{ $fechaNormaltres }}</label>
</div>
<div class="form-group">
    <label class="col-lg-1 control-label text-bold">¿Cotiza en CAUDO?</label>
    <label class="col-lg-3 control-label">
        @if($afiliado->cotizaUdo == 1)
        Si
        @elseif($afiliado->cotizaUdo == 0)
        No
        @endif
    </label>
</div>
