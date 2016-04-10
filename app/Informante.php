<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informante extends Model
{
    protected $fillable = [
	        'nombre','email','telefono',
		];

	protected $table = 'responsables';
}
