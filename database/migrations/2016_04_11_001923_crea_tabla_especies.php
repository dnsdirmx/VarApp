<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaEspecies extends Migration
{
	public function up()
		    {
        Schema::create('especies', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('phylum');
		    $table->string('reino');
		    $table->string('subclase');
		    $table->string('familia');
		    $table->string('genero');
		    $table->string('especie');
		    $table->string('nombreComun');
		    $table->integer('orden_id')->unsigned();
		
		    $table->timestamps();
	
			$table->foreign('orden_id')->references('id')->on('ordens');
		});
	}

	public function down()
	{
		Schema::drop('especies');
	}
}
