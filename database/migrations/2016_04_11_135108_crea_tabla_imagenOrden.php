<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaImagenOrden extends Migration
{
	public function up()
    {
		Schema::create('imagen_orden', function (Blueprint $table)
		{
			$table->integer('imagen_id')->unsigned()->unique();
			$table->integer('orden_id')->unsigned();

			$table->foreign('orden_id')->references('id')->on('ordenes');
			$table->foreign('imagen_id')->references('id')->on('imagenes');
		});
    }
 
	public function down()
    {
		Schema::drop('imagen_orden');
    }}
