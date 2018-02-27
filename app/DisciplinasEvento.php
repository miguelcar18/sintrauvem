<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisciplinasEvento extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'disciplinas_eventos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['disciplina', 'evento'];

    public function nombreDisciplina() {
        return $this->hasOne('App\Disciplina', 'id', 'disciplina');
    }

    public function nombreEvento() {
        return $this->hasOne('App\Evento', 'id', 'evento');
    }
}
