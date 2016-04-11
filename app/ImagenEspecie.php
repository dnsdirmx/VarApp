<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Imagen;
class ImagenEspecie extends Model
{	
	public function especie()
	{
		return $this->belongsToMany('App\Especie','imagen_especie');
	}
}
