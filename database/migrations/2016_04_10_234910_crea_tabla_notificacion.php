<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaNotificacion extends Migration
{
	public function up()
	{
		Schema::create('notificaciones', function (Blueprint $table) {
			$table->increments('id');
		    $table->text('contenido');
		    $table->integer('reporte_id')->unsigned();
		    $table->integer('responsable_id')->unsigned();
		    $table->timestamps();
		    
		    $table->foreign('reporte_id')->references('id')->on('reportes');
		    $table->foreign('responsable_id')->references('id')->on('responsables');
		
		});
	}

	public function down()
	{
		Schema::drop('notificaciones');
	}
}
