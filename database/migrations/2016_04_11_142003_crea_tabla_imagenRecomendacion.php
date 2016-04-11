<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaImagenRecomendacion extends Migration
{
	public function up()
    {
		Schema::create('imagen_recomendacion', function (Blueprint $table)
		{
			$table->integer('imagen_id')->unsigned()->unique();
			$table->integer('recomendacion_id')->unsigned();

			$table->foreign('recomendacion_id')->references('id')->on('recomendaciones');
			$table->foreign('imagen_id')->references('id')->on('imagenes');
		});
    }
 
	public function down()
    {
		Schema::drop('imagen_recomendacion');
	}

}
