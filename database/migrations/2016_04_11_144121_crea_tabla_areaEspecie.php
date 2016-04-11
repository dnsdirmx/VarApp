<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaAreaEspecie extends Migration
{
	public function up()
    {
		Schema::create('area_especie', function (Blueprint $table)
		{
			$table->integer('area_id')->unsigned()->unique();
			$table->integer('especie_id')->unsigned();

			$table->foreign('area_id')->references('id')->on('areas');
			$table->foreign('especie_id')->references('id')->on('especies');
		});
    }
 
	public function down()
    {
		Schema::drop('area_especie');
	}}
