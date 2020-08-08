<?php 
namespace App\Models;
use Illuminate\Support\Facades\DB;

class JawabanModels{
    public static function get_all(){
        $jawaban = DB::table('jawaban')->get();
        return $jawaban;
    }

    public static function save($data){
        $new_jaw = DB::table('jawaban')->insert($data);
        return $new_jaw;
    }

    public static function get_from($pertanyaan_id){
        $jawaban = DB::table('jawaban')->where('pertanyaan_id', $pertanyaan_id)->get();
        return $jawaban;
    }
    public static function destroy($id){
        $deleted = DB::table('jawaban')
                            ->where('id',$id)
                            ->delete();

        return $deleted;
    }
}
?>