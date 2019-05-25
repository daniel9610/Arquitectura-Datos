<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carrito extends Model
{
    
	protected $table ='carrito';

    protected $fillable =['id','codigos','fid_productos','direcciones_IP','cantidades_agregadas','estados'];

	public function productos(){

    	return $this->hasOne('App\productos');

    }

    public function cliente(){

    	return $this->belongsTo('App\cliente');

    }

}
