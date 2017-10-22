<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atleta extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'atletas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['afiliado', 'disciplinaUno', 'disciplinaDos'];

    public function nombreAfiliado() {
        return $this->hasOne('App\Afiliado', 'id', 'afiliado');
    }

    public function nombreDisciplinaUno() {
        return $this->hasOne('App\Disciplina', 'id', 'disciplinaUno');
    }

    public function nombreDisciplinaDos() {
        return $this->hasOne('App\Disciplina', 'id', 'disciplinaDos');
    }
}
