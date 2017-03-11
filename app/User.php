<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', //autoriza el envío masivo, son los campos que el usuario llena en los formularios
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile(){

        return $this->hasOne('App\Profile');//Un usuario tiene un perfil
    }

    public function products(){

        return $this->hasMany('App\Product');//Un usuario tiene muchos productos
    }

    public function groups(){

        return $this->belongsToMany('App\Group');//Un usuario pertenece a muchos grupos
    }

    public function setPasswordAttribute($plainPassword){

        $this->attributes['password'] = Hash::make($plainPassword);//cifrar el password
    }

}
