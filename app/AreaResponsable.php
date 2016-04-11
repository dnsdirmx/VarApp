<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Area;
class AreaResponsable extends Area
{
	public function responsable()
	{
		return $this-belongsToMany('App\Responsable','area_responsable');
	}
}

