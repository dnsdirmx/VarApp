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

	public function imagenes()
	{
		return $this->belongsToMany('App\ImagenPregunta','imagen_pregunta');
	}

	public function respuestaAnterior()
	{
		return $this->belongsToMany('App\Respuesta','respuesta_pregunta');
	}
}
