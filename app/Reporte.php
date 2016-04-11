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

	protected $table = 'reportes';

    public function especimenes()
    {
	        return $this->hasMany('App\Especimen');
	    }
    public function informante()
    {
	        return $this->BelongsTo('App\Informante');
	}

}
