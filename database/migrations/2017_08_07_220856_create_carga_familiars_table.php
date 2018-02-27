<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargaFamiliarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carga_familiar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('cedula');
            $table->string('edad');
            $table->string('relacion');
            $table->integer('afiliado')->unsigned();
            $table->foreign('afiliado')->references('id')->on('afiliados')->onDelete('cascade');
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
        Schema::dropIfExists('carga_familiar');
    }
}
