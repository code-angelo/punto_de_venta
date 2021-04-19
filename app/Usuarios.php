<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $fillable = ['id', 'nombre', 'apellido', 'tipo','telefono','estatus'];
}
