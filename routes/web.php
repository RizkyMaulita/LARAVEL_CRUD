<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// use Illuminate\Routing\Route;

// use Illuminate\Routing\Route;
/*
//--------THEORY MVC, WEEK 3, DAY 2 --------------------------------
Route::get('/', function () {       //kalau gak hanya pakai '/' berarti urlnya di localhost:8000
    return view('welcome');         //ini view merupakan folder yang isinya ada file welcome.php . see -> resourcers/view
});

Route:: get('/test',function(){
    return 'OK';
}); 
Route::get('foo', function () {
    return 'Hello World';
});
 Route menggunakan parameter $id
Route::get('user/{id}', function ($id) {
    return 'User '.$id;
}); 

Route::get('/halo/{nama}', function ($nama) {
    return 'Halo '.$nama;
});
Route:: get('/test',function(){
    return view('test');
});

Route:: get('/test/{angka}',function($angka){
    return view('test',["angka"=> $angka]);
});

Route::get('/form','ResgisterController@form');
Route::get('/sapa','ResgisterController@sapa');  
Route::post('/sapa','ResgisterController@sapa_post');

*/
/* 
//---------------------TASK MVC, WEEK 3, DAY 2------------------------
Route:: get('/','HomeController@home');
Route:: get('/register','AuthController@register');
// Route:: get('/welcome2','AuthController@welcome');
Route:: post('/welcome2','AuthController@welcome');

//----------THEORY TEMPLATE BLADE, WEEK 3, DAY 3--------------------------------
Route::get('/master',function(){
    return view('adminlte.master');
});

Route::get('/items',function(){
    return view('items.index');
});

Route::get('/items/create',function(){
    return view('items.create');
});

*/
//---------TASK TEMPLATE BLADE, WEEK 3, DAY 3-----------------------------
Route::get('/', function () {
    return view('taskblade.home');
});
Route::get('/data-tables', function () {
    return view('taskblade.data-tables');
});