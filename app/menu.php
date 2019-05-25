<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    
	protected $table ='menus';

    protected $fillable =['id','nombres','rutas_imagenes','fid_categorias'];

    public function categoria(){

    	return $this->hasOne('App\categoria');

    }

}
