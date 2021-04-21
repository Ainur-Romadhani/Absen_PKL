<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Absensi;
use DB;
use Carbon\Carbon;

class AbsenController extends Controller
{
    public function absenhadir(Request $request){
        $cek = Absensi::where('id_siswa','=',$request->input('id_siswa'))->where('tanggal_absen','=',Date('Y-m-d'))->count();
        // dd($cek);
        if($cek > 0){

            return response()->json('Nis kamu tidak terdaftar ', 401);
        }else{
            DB::table('absensi')->insert([
            'tanggal_absen' => Date('Y-m-d'),
            'jam' => Date('H:i:s'),
            'status' => '0',//Belum di konfirmasi
            'SIA' =>'Hadir',
            'lokasi'=>$request->input('lokasi'),
            'laporan' => 'Belum Di Verifikasi',
            'keterangan'=> '',
            'id_siswa' => $request->input('id_siswa'),
            'id' => $request->input('id'),
            ]
        );
            return response()->json("Absen Berhasil" ,200);
        }
        
    }

    public function absenizinsakit(Request $request){
        $cek = Absensi::where('id_siswa','=',$request->input('id_siswa'))->where('tanggal_absen','=',Date('Y-m-d'))->count();
        if($cek > 0){

            return response()->json('Nis kamu tidak terdaftar Asu', 401);
        }else{
            DB::table('absensi')->insert([
                'tanggal_absen' => Date('Y-m-d'),
                'jam' => Date('H:i:s'),
                'status' => '0',//Belum di konfirmasi
                'SIA' =>$request->input('SIA'),
                'laporan' => 'Belum Di Verifikasi',
                'lokasi'=>$request->input('lokasi'),
                'keterangan'=> $request->input('keterangan'),
                'id_siswa' => $request->input('id_siswa'),
                'id' => $request->input('id'),
                ]
            );
            return response()->json("Absen Berhasil" ,200);
        }
    } 

    public function history($id, $siswa){
        
        $data = Absensi::where('status','=', $id)
        ->where('id_siswa','=',  $siswa)->get();
        
        
        return response()->json($data);
    }
}
