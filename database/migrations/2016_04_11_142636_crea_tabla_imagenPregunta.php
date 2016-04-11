<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaImagenPregunta extends Migration
{
	public function up()
    {
		Schema::create('imagen_pregunta', function (Blueprint $table)
		{
			$table->integer('imagen_id')->unsigned()->unique();
			$table->integer('pregunta_id')->unsigned();

			$table->foreign('pregunta_id')->references('id')->on('preguntas');
			$table->foreign('imagen_id')->references('id')->on('imagenes');
		});
    }
 
	public function down()
    {
		Schema::drop('imagen_pregunta');
	}}
