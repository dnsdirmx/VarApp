<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    /**
	 *      * The attributes that are mass assignable.
	 *           *
	 *                * @var array
	 *                     */
    protected $fillable = [
	        'latitud','longitud','precision','creadoDispositivo','observaciones',
		    ];
 
	public function notificacion()
    {
	        return $this->hasOne('App\Notiicacion');
	    }
    public function mamiferos()
    {
	        return $this->hasMany('App\Mamifero');
	    }
    public function informante()
    {
	        return $this->BelongsTo('App\Informante');
	    }

}
