<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaRecomendaciones extends Migration
{
	public function up()
	{
        Schema::create('recomendaciones', function (Blueprint $table) {
			$table->increments('id');
		    $table->text('descripcion');
		    $table->integer('orden_id')->unsigned();
		    $table->timestamps();
		
		    $table->foreign('orden_id')->references('id')->on('ordenes');
		});
	}
	public function down()
	{
		Schema::drop('recomendaciones');
	}
}
