<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaPregunta extends Migration
{
	public function up()
	{
        Schema::create('preguntas', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('pregunta');
		    $table->boolean('inicial');
		    $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('preguntas');
	}
}
