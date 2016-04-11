<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recomendacion extends Model
{

	protected $table = 'recomendaciones';

    public function orden()
    {
		return $this->BelongsTo('App\Orden');
	}
}
