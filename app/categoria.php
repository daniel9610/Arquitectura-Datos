<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $table ='categoria';

    protected $fillable =['id','nombres'];

    public function menus(){

    	return $this->belongsTo('App\menus');

    }
}
