<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('responsables', function (Blueprint $table) {
			$table->increments('id');
	        $table->string('nombre');
	        $table->string('adscripcion');
	        $table->string('telefono');
	        $table->boolean('activo');
	        $table->string('rol');
	        $table->string('email')->unique();
			$table->string('password');
			$table->string('api_token', 60)->unique();
	        $table->timestamps();
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::drop('responsables');
    }
}
