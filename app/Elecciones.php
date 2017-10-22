<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elecciones extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'elecciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['afiliado', 'centro', 'mesa'];

    public function nombreAfiliado() {
        return $this->hasOne('App\Afiliado', 'id', 'afiliado');
    }
}
