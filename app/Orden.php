<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
	protected $fillable = [
        'clase','orden',
    ];
    
	protected $table = 'ordenes';

    public function especies()
    {
        return $this->hasMany('App\Especie');
    }
}
