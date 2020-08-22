<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    //One To One
    public function profile(){
        return $this -> hasOne('App\Profile');          //karena fk nya ada di profile, maka di model user ditulis hasOne
        // return $this-> hasOne('App\Profile', 'foreign_key');     //ini digunakan jika nama fknya tidak mengikuti konversi singular-plural dari laravel
    }

    //One To Many
    public function post(){
        return $this -> hasMany('App\Post');        //di user tidak ada fk post. hanya di table post yang ada fknya 
    }       //mau lihat ini work atau gak, see di PostController@index
}
