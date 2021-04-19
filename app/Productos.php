<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    //
    protected $fillable = ['nombre', 'marca', 'descripcion','precio_adquirido','precio_venta','unidades', 'estatus'];

}
