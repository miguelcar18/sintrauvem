<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'afiliados';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'apellido', 'cedula', 'sexo', 'fechaNacimiento', 'edad', 'telefonoCasa', 'telefonoMovil', 'correo', 'cargo', 'fechaIngreso', 'aniosServicio', 'status', 'dependencia', 'fechaAfiliacion', 'cotizaUdo', 'disciplina', 'pathCedula', 'pathImagen'];

    public function nombreCargo() {
        return $this->hasOne('App\Cargos', 'id', 'cargo');
    }
}
