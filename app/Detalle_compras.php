<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_compras extends Model
{
    protected $table = 'detalle_compras';

    protected $fillable = ['compra_id', 'producto_id', 'producto', 'precio', 'cantidad'];
}
