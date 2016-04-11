<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaEspecie extends Respuesta
{
    public function especie()
    {
		return $this->belongsToMany('App\Especie','respuesta_especie');
	}
	
}
