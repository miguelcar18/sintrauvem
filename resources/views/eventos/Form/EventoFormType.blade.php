<div class="form-group">
    <label class="col-lg-2 control-label text-bold">Fecha:</label>
    <div class="col-lg-4">
        @if(isset($evento->fecha))
            <?php 
                $separarFecha =  explode('-', $evento->fecha);
                $fechaNormal =  $separarFecha[2].'/'.$separarFecha[1].'/'.$separarFecha[0];
            ?>
            {!! Form::text('fecha', $fechaNormal, array('class' => 'form-control col-md-7 col-xs-12 daterange-single', 'id' => 'fecha', 'placeholder' => 'Fecha', 'required' => 'required')) !!}
        @else
            {!! Form::text('fecha', null, array('class' => 'form-control col-md-7 col-xs-12 daterange-single', 'id' => 'fecha', 'placeholder' => 'Fecha', 'required' => 'required')) !!}
        @endif
    </div>
    <label class="col-lg-3 control-label text-bold">Solicita transporte:</label>
    <div class="col-lg-3">
        {!! Form::select('solicitudTransporte', array('' => 'Seleccione', '1' => 'Si', '0' => 'No'), null, $attributes = array('id' => 'solicitudTransporte', 'class' => 'form-control', 'required' => 'required')) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-lg-2 control-label text-bold">Tipo de torneo:</label>
    <div class="col-lg-4">
        {!! Form::text('tipoTorneo', null, array('class' => 'form-control col-md-7 col-xs-12', 'id' => 'tipoTorneo', 'placeholder' => 'Tipo de torneo', 'required' => 'required')) !!}
    </div>
    <label class="col-lg-2 control-label text-bold">Lugar:</label>
    <div class="col-lg-4">
        {!! Form::textarea('lugar', null, $attributes = array('id' => 'lugar', 'class' => 'form-control', 'rows' => '3', 'placeholder' => 'Lugar')) !!}
    </div>
</div>