<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
	protected $table ='cliente';

    protected $fillable =['id','nombres','apellidos','cedula','fid_carrito','direcciones_IP','direcciones','totales_cancelados_por_productos'];
    
	public function carrito(){

    	return $this->hasOne('App\carrito');

    }

}
