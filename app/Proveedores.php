<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $fillable = ['nombre', 'apellido', 'telefono', 'estatus',];
}
