<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaPregunta extends Respuesta
{
    public function siguientePregunta()
    {
		return $this->belongsToMany('App\Pregunta','respuesta_pregunta');
	}
	
}
