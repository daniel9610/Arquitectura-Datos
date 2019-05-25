<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ingrediente;

class productos extends Model
{
    protected $table ='productos';

    protected $fillable =['id','cantidades','nombres','fid_subcategorias','ubicaciones','precios','descripciones','codigos','rutas_imagenes', 'ingredientes'];

    public function menus(){

    	return $this->hasOne('App\menus');

    }

    public function ingrediente(){
        return $this->hasMany('App\Ingrediente');
    }

    public function carrito(){

    	return $this->belongsTo('App\carrito');

    }
}
