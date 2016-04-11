<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    protected $fillable = [
	        'phylum','reino','subclase','familia','genero','especie','nombreComun','imagen_id','ord
			en_id',
	];

	protected $table = 'especies';

	public function orden()
	{
        return $this->BelongsTo('App\Orden');
    }
    public function especimenes()
	{
		return $this->hasMany('App\Especimen');
	}

	public function imagenes()
	{
		return $this->belongsToMany('App\ImagenEspecie','imagen_especie');
	}
	public function areas()
	{
		return $this->belongsToMany('App\AreaEspecie','area_especie');
	}

	public function pregunta()
	{
		return $this->belongsToMany('App\RespuestaEspecie','respuesta_especie');
	}

}

