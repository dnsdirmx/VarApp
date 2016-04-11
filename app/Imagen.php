<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $fillable = [
		'nombre','nombreOriginal','path','coleccion',
	];


	protected $table = 'imagenes';
}
