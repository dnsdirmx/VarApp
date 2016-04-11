<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaEspecimen extends Migration
{
	public function up()
	{
		Schema::create('especimenes', function (Blueprint $table) {
			$table->increments('id');
		    $table->string('estado');
		    $table->string('sexo');
		    $table->integer('especie_id')->unsigned();
		    $table->integer('imagen_id')->unsigned();
		    $table->integer('reporte_id')->unsigned();
		    $table->timestamps();
		    $table->foreign('imagen_id')->references('id')->on('imagens');
		    $table->foreign('especie_id')->references('id')->on('especies');
		    $table->foreign('reporte_id')->references('id')->on('reportes');
		});
    }
	public function down()
	{
		Schema::drop('especimenes');
	}

}
