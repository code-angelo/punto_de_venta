<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $fillable = ['usuario_id', 'cliente_id', 'recibido', 'cambio', 'total', 'created_at'];
}
