<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_ventas extends Model
{
    protected $table = 'detalle_ventas';

    protected $fillable = ['venta_id', 'producto_id', 'producto', 'precio', 'cantidad'];
}
