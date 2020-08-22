<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function User(){
        return $this -> belongsTo('App\User');      //ini karena di profile ada fk, maka disini ditulis 'belongsTo'
    }
}
