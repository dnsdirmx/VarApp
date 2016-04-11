<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
	protected $fillable = [
	        'pregunta','inicial',
		];

	protected $table = 'preguntas';

	public function respuestas()
	{
		return $this->hasMany('App\Respuesta');
	}
}
