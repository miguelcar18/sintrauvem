<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfiliadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afiliados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('cedula');
            $table->string('sexo');
            $table->date('fechaNacimiento');
            $table->integer('edad');
            $table->string('telefonoCasa');
            $table->string('telefonoMovil');
            $table->string('correo');
            $table->integer('cargo')->unsigned();
            $table->date('fechaIngreso');
            $table->integer('aniosServicio');
            $table->string('status');
            $table->string('dependencia');
            $table->date('fechaAfiliacion');
            $table->integer('cotizaUdo');
            $table->string('pathCedula')->nullable;
            $table->string('pathImagen')->nullable;
            $table->foreign('cargo')->references('id')->on('cargos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afiliados');
    }
}
