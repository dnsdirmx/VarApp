<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CraTablaRespuestaEspecie extends Migration
{
	public function up()
    {
		Schema::create('respuesta_especie', function (Blueprint $table)
		{
			$table->integer('respuesta_id')->unsigned()->unique();
			$table->integer('especie_id')->unsigned();

			$table->foreign('respuesta_id')->references('id')->on('respuestas');
			$table->foreign('especie_id')->references('id')->on('especies');
		});
    }
 
	public function down()
    {
		Schema::drop('respuesta_especie');
	}}
