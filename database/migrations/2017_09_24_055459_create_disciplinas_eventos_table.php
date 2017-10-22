<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinasEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplinas_eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('disciplina')->unsigned();
            $table->integer('evento')->unsigned();
            $table->foreign('disciplina')->references('id')->on('disciplinas')->onDelete('cascade');
            $table->foreign('evento')->references('id')->on('eventos')->onDelete('cascade');
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
        Schema::dropIfExists('disciplinas_eventos');
    }
}
