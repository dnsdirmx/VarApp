<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $fillable = [
	        'contenido',
		];

	protected $table = 'notificaciones';
    public function reporte()
    {
	        return $this->belongsTo('App\Reporte');
	    }

    public function responsable()
    {
	        return $this->belongsTo('App\Responsable');
	}
}

