<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResgisterController extends Controller
{
//     public function form(){
//         return "OK";
//     }
        public function form(){
            return view('form');
        }
        public function sapa(Request $request){
            // var_dump($request);      //mau lihat isi request
            //dd($request);           //ini juga buat lihat isi request, tapi tampilannya lebih baik
            // dd($request['alamat']);
            // return "Halo";
        }
        public function sapa_post(Request $request){
            // dd($request->all());        //gak tahu ini belum bisa :(
            //pelajari lagi yang post dan dd ini di link https://www.youtube.com/watch?v=BB-zP1Z8Fco&t=858s
            $nama = $request['nama'];
            return "$nama";
        }
}
