<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaImagenEspecie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('flights', function (Blueprint $table)
		{
			$table->integer('imagen_id')->unsigned()->unique();
			$table->integer('especie_id')->unsigned();

			$table->foreign('especie_id')->references('id')->on('especies');
			$table->foreign('imagen_id')->references('id')->on('imagenes');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::drop('imagen_especie');
    }
}
