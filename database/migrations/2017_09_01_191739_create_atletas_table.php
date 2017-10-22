<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atletas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('afiliado')->unsigned();
            $table->integer('disciplinaUno')->unsigned();
            $table->integer('disciplinaDos')->unsigned();
            $table->foreign('afiliado')->references('id')->on('afiliados')->onDelete('cascade');
            $table->foreign('disciplinaUno')->references('id')->on('disciplinas')->onDelete('cascade');
            $table->foreign('disciplinaDos')->references('id')->on('disciplinas')->onDelete('cascade');
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
        Schema::dropIfExists('atletas');
    }
}
