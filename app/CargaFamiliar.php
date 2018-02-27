<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CargaFamiliar extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'carga_familiar';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'relacion', 'cedula', 'edad', 'afiliado'];

    public function nombreAfiliado() {
        return $this->hasOne('App\Afiliado', 'id', 'afiliado');
    }
}
