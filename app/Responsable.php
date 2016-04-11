<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Responsable extends Model implements
    AuthenticatableContract,
    AuthorizableContract
{
    use Authenticatable, Authorizable;

    protected $fillable = [
        'nombre','adscripcion','telefono','activo','rol','email'
    ];

    protected $hidden = [
        'password',
	];
	protected $table = 'responsables';

	public function areas()
	{
		return $this->belongsToMany('App\AreaResponsable','area_responsable');
	}
}
