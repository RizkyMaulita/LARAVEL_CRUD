<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'Posts';     //jadi sebenarnya ini digunakan jika misal nama modelnya bukan singular dari nama tabelnya

    // protected $fillable = ["title", "body"];    //masukkan kolom mana saja yang mau diisi
    protected $guarded = [];

    //One To Many
    public function author(){                   
        return $this -> belongsTo('App\User', 'user_id');        //ini karena d post ada fk user
    }

    //Many To Many
    public function tags(){
        return $this -> belongsToMany('App\Tag', 'Post_Tags','post_id','tag_id');
    }
    /* lihat dokumentasi many to many -> https://laravel.com/docs/6.x/eloquent-relationships#many-to-many
        disitu terlihat bahwa dalam membuat model penghubung antara 2 tabel harus diurutkan sesuai alphabetic */

}
