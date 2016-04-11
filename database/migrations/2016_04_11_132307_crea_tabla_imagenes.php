<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaImagenes extends Migration
{
	public function up()
	{
        Schema::create('imagenes', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('nombre');
		    $table->string('nombreOriginal');
		    $table->string('path');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('imagenes');
	}
}
