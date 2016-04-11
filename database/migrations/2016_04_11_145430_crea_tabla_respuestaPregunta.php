<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaRespuestaPregunta extends Migration
{
	public function up()
    {
		Schema::create('respuesta_pregunta', function (Blueprint $table)
		{
			$table->integer('respuesta_id')->unsigned()->unique();
			$table->integer('pregunta_id')->unsigned();

			$table->foreign('respuesta_id')->references('id')->on('respuestas');
			$table->foreign('pregunta_id')->references('id')->on('preguntas');
		});
    }
 
	public function down()
    {
		Schema::drop('respuesta_pregunta');
	}}
