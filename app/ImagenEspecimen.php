<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Imagen;
class ImagenEspecimen extends Imagen
{	
	public function especimen()
	{
		return $this->belongsToMany('App\Especimen','imagen_especimen');
	}
}
