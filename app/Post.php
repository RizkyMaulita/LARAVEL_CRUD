<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'Posts';     //jadi sebenarnya ini digunakan jika misal nama modelnya bukan singular dari nama tabelnya

    // protected $fillable = ["title", "body"];    //masukkan kolom mana saja yang mau diisi
    protected $guarded = [];
}
