<div class="row">
    <div class="col-md-6">
        <div class="form-group has-feedback">
            {!! Form::text('username', null, $attributes = array('id' => 'username', 'class' => 'form-control', 'placeholder' => 'Nombre de usuario', 'required' => 'required')) !!}
            <div class="form-control-feedback">
                <i class="icon-user-plus text-muted"></i>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group has-feedback">
            {!! Form::select('rol', array('' => 'Seleccione cargo','1' => 'Secretario general', '0' => 'Invitado'), null, $attributes = array('id' => 'rol', 'class' => 'form-control', 'required' => 'required')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group has-feedback">
            {!! Form::text('name', null, $attributes = array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'Nombre y apellido', 'required' => 'required')) !!}
            <div class="form-control-feedback">
                <i class="icon-user-check text-muted"></i>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group has-feedback">
            {!! Form::text('cedula', null, $attributes = array('id' => 'cedula', 'class' => 'form-control', 'placeholder' => 'Cédula de identidad', 'required' => 'required')) !!}
            <div class="form-control-feedback">
                <i class="icon-vcard text-muted"></i>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group has-feedback">
            {!! Form::email('email', null, array('id' => 'email', 'placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required')) !!}
            <div class="form-control-feedback">
                <i class="icon-mention text-muted"></i>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group has-feedback">
            {!! Form::file('file', $attributes = array('class' => 'form-control file-styled', 'id' => 'file', 'accept' => 'image/jpg,image/png,image/jpeg,image/gif')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group has-feedback">
            {!! Form::password('password', array('class' => 'form-control', 'id' => 'password', 'placeholder' => 'Contraseña', 'required' => 'required')) !!}
            <div class="form-control-feedback">
                <i class="icon-user-lock text-muted"></i>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group has-feedback">
            {!! Form::password('password_confirmation', array('class' => 'form-control', 'id' => 'password_confirmation', 'placeholder' => 'Repita contraseña', 'required' => 'required')) !!}
            <div class="form-control-feedback">
                <i class="icon-user-lock text-muted"></i>
            </div>
        </div>
    </div>
</div>