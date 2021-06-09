<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function authorizeRoles($roles){
        if($this->hasAnyRole($roles)){
            return true;
        }
        abort(401, 'Permiso no autorizado');
    }

    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        } else {
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }

    public function hasRole($role){
        if($this->roles()->where('nombre', $role)->first()){
            return true;
        }
        return false;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'email', 'password', 'apellido', 'estatus', 'telefono'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['password'] = \Hash::make($valor);
        }
    }
}