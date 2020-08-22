<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;       //memanggil model post
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB as FacadesDB;
use Auth;

class PostController extends Controller
{
    public function __construct()
    {
        // $this -> middleware('auth');
        // $this -> middleware('auth') -> except('index');          
        $this -> middleware('auth') -> only ('create','store','edit','update');

        /* jadi middleware ini untuk mengamankan bahwa yang hanya bisa akses ke sini hanyalah user yang sudah login
           jika ada halaman yang dapat diakses namun user tidak perlu login terlebih dahulu, maka gunakan -> except('nama route');
            namun jika misal ada halaman tertentu saja yang bisa diakses dengan login terlebih dahulu, maka gunakan -> only ('nama route');     */ 
    }  

    public function create(){
        return view('posts.create');
    }
    public function store(Request $request){
        // dd($request->all());
        $request->validate([                        //ini untuk memberikan validasi bahwa form harus diisi. maka perlu juga message error yang ada di view create
            'title' => 'required|unique:posts',     //arti unique ini tidak boleh ada data yang sama di databasenya.  nanti akan memunculkan alert '..has already been taken'
            'body' => 'required'
        ]);

        /*
        //---------Ini pakai Query Builder (Materi CRUD di WEEK 3)------------------------
        $query = DB::table('posts')->insert(        //ini untuk memasukkan ke table database
            [
                'title' => $request['title'],       //untuk yang user_id di code sini tidak null, maka pasti akan error.
                'body' => $request['body']          //so mesti diganti dulu menjadi null di phpmyadminnya, sehingga bisa code ini bisa berjalan
            ]
        );
        */

        /*-----------Ini pakai Eloquent ORM Laravel (Materi CRUD di WEEK 4)-------------------
            - Metode menyimpan data dalam ORM ada dua yaitu 
                    1. Metode Save
                    2. Metode Mass Assignment                               */
        
        //---Metode Save                                                               
        /*
        $post = new Post;                       //ini seperti OOP, dan controller ini bagian main/indexnya
        $post -> title = $request['title'];     //$request['title'] -> itu dari class/name yang ada di file blade.php
        $post -> body = $request['body'];       //sedangkan $post -> title atau $post -> body itu sesuai dengan column yang ada di table posts
        $post -> save();                                
        */        
        
        /*---Metode Mass Assignment
            1. buat fillable di modelnya terlebih dahulu. jadi nanti kolom dalam array fillalbe itulah yang akan diisi oleh $request
            2. jika misal kolomnya terlalu banyak, maka tidak usah pakai fillable tapi pakai guarded. 
                    - jadi fillable itu whitelist -> dimana isinya merupakan kolom mana saja yang mau diisi
                    - kalau guarded itu blacklist -> kolom mana saja yang tidak boleh diisi
                    - jadi kalau misalkan semua kolomnya itu perlu diisi, $guarded = [];     */
       
        $post = Post::create([
            "title" => $request['title'],
            "body" => $request['body'],
            "user_id" => Auth::id()
        ]);        

        return redirect('/posts') -> with('success','Post Berhasil Disimpan!');
    }
    public function index(){
        /*--------- Ini Pakai Query Builder (Materi CRUD di WEEK 3)--------------
        $posts = DB::table('posts')->get();     //seperti, select * from posts
        // dd($posts);
        */

        /*--------- Ini Pakai Eloquent ORM Model (Materi CRUD di WEEK 4)----------*/
        $posts = Post::all();
        // dd($post);
        return view('posts.index', compact('posts'));   //compact ini untuk mengambil data dari array
    }
    public function show($id){
        /*--------- Ini Pakai Query Builder (Materi CRUD di WEEK 3)--------------
        //$post = DB::table('posts') -> where('id', $id) -> get();      //gak pakai get(), melainkan first(). hal ini karena jika pakai get(), akan memunculkan semua datanya dalam bentuk array multi dari 0
        $post = DB::table('posts') -> where('id', $id) -> first();      //jadi jika pakai get(), akan mengambil sebuah array yang berisi object2
                                                                        //namun jika pakai first(), akan mengambil satu object yang pertama kali dia temukan
        */

        /*--------- Ini Pakai Eloquent ORM Model (Materi CRUD di WEEK 4)----------*/
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }
    public function edit($id){
        /*--------- Ini Pakai Query Builder (Materi CRUD di WEEK 3)--------------
        $post = DB::table('posts') -> where('id', $id) -> first();
        */

        /*--------- Ini Pakai Eloquent ORM Model (Materi CRUD di WEEK 4)----------*/
        $post = Post::find($id);
        //cara lain bisa digunakan lihat link ini ->  https://laravel.com/docs/6.x/eloquent#retrieving-single-models
        return view('posts.edit', compact('post'));
    }
    public function update($id, Request $request){
        $request->validate([                        
            'title' => 'required|unique:posts',     
            'body' => 'required'
        ]);
        /*--------- Ini Pakai Query Builder (Materi CRUD di WEEK 3)--------------

        $query = DB::table('posts')
                    -> where('id', $id)
                    -> update([
                        'title' => $request['title'],
                        'body' => $request['body']
                    ]);
        */
        
        /*--------- Ini Pakai Eloquent ORM Model (Materi CRUD di WEEK 4)----------*/
        $post = Post::where('id', $id) -> update([
            'title' => $request['title'],
            'body' => $request['body']
        ]);
        return redirect('/posts') ->with('success', 'Berhasil update post!');
    }
    public function destroy($id){
        /*--------- Ini Pakai Query Builder (Materi CRUD di WEEK 3)--------------
        $query = DB::table('posts') -> where('id', $id) -> delete();
        */

        /*--------- Ini Pakai Eloquent ORM Model (Materi CRUD di WEEK 4)----------*/
        Post::destroy($id);
        return redirect('/posts') -> with('success', 'Post berhasil dihapus!');
    }
}
