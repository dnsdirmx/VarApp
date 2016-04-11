<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaAreaResponsable extends Migration
{
	public function up()
    {
		Schema::create('area_responsable', function (Blueprint $table)
		{
			$table->integer('area_id')->unsigned()->unique();
			$table->integer('responsable_id')->unsigned();

			$table->foreign('area_id')->references('id')->on('areas');
			$table->foreign('responsable_id')->references('id')->on('responsables');
		});
    }
 
	public function down()
    {
		Schema::drop('area_responsable');
	}}
