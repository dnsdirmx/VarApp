<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaImagenEspecimen extends Migration
{
    public function up()
    {
		Schema::create('imagen_especimen', function (Blueprint $table)
		{
			$table->integer('imagen_id')->unsigned()->unique();
			$table->integer('especimen_id')->unsigned();

			$table->foreign('especimen_id')->references('id')->on('especimenes');
			$table->foreign('imagen_id')->references('id')->on('imagenes');
		});
    }
 
	public function down()
    {
		Schema::drop('imagen_especimen');
	}
}
