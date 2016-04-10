<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaReportes extends Migration
{
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->increments('id');
            $table->double('latitud');
            $table->double('longitud');
            $table->double('precision');
            $table->dateTime('creadoDispositivo');
            $table->text('observaciones');
            $table->integer('informante_id')->unsigned();
            $table->timestamps();

            $table->foreign('informante_id')->references('id')->on('informantes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('reportes');
    }
}
