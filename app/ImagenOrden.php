<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Imagen;
class ImagenOrden extends Imagen
{	
	public function orden()
	{
		return $this->belongsToMany('App\Orden','imagen_orden');
	}
}
