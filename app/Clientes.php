<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $fillable = ['nombre', 'apellido', 'direccion', 'estatus'];
}
