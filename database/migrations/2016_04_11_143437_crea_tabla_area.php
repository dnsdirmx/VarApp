<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaArea extends Migration
{
	public function up()
	{
        Schema::create('areas', function (Blueprint $table) {
	        $table->increments('id');
	        $table->double('aLatitud');
	        $table->double('aLongitud');
	        $table->double('bLatitud');
	        $table->double('bLongitud');
	        $table->double('cLatitud');
	        $table->double('cLongitud');
	        $table->double('dLatitud');
	        $table->double('dLongitud');
	        $table->timestamps();
		});
	}
	public function down()
	{
        Schema::drop('areas');
	}
}
