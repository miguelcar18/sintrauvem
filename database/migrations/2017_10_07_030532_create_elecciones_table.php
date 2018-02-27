<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEleccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elecciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('afiliado')->unsigned();
            $table->string('centro');
            $table->integer('mesa');
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
        Schema::dropIfExists('elecciones');
    }
}
