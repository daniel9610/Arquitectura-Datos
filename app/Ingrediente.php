<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\productos;

class Ingrediente extends Model
{
    public function producto()
    {
        return $this->belongsTo('App\productos');
    }
}
