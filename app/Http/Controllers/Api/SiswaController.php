<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Siswa;
use DB;
 
class SiswaController extends Controller
{
    public function login(Request $request ){
        $data = Siswa::where('nis',$request->input('nis'))->count();
        $data1 = DB::table('siswa')->where('nis',$request->input('nis'))->get();

        if($data == 0){
            return response()->json('Nis kamu tidak terdaftar Asu', 401);
        }
        else{
            return response()->json($data1, 200) ;
        }
    }

public function datasiswa(Request $request){
    $data1 = DB::table('siswa')->where('nis',$request->input('id_siswa'))->get();
    $data = DB::table('siswa')->where('nis',$request->input('id_siswa'))->count();

    if($data == 0){
        return response()->json('Data Kosong !!!', 401);
    }
    else{
        return response()->json($data1, 200) ;
    }
}

}
