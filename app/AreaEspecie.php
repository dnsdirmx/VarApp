<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Area;
class AreaEspecie extends Area
{
	public function especie()
	{
		return $this-belongsToMany('App\Especie','area_especie');
	}
}

