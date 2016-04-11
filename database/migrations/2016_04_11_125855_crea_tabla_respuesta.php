<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaRespuesta extends Migration
{
	public function up()
	{
        Schema::create('respuestas', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('respuesta');
			$table->integer('pregunta_id')->unsigned();
		    $table->timestamps();
		
		    $table->foreign('pregunta_id')->references('id')->on('preguntas');
		});
	}

	public function down()
	{
        Schema::drop('respuestas');
	}
}
