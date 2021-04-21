<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Pembimbing;
use App\Kelas;
use DB;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view ('admin/siswa/datasiswa',compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sekolah = DB::table('users')->where('role','sekolah')->get();
        $magang = DB::table('users')->where('role','magang')->get();
        $jurusan = Kelas::all();
        return view('admin/siswa/createsiswa',compact('sekolah','jurusan','magang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if($request->hasFile('foto')){
            $fotobarang = $request->file('foto');
            $ext = $fotobarang->getClientOriginalExtension();
            if($request->file('foto')->isValid()){
                $foto_name = date('YmdHis'). ".$ext";
                $upload_path = 'fotosiswa';
                $request->file('foto')->move($upload_path, $foto_name);
                $data['foto'] = $foto_name;
            }
        }
       
        $siswa = Siswa::create($data);
        return redirect ('/DataSiswa');
    }

    public function tambah(Request $request)
    {
        Kelas::create($request->all());
        return redirect ('/DataSiswa/create');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id_siswa)
    {
        $siswa = Siswa::findOrFail($id_siswa);
        return view('admin.siswa.qrcode',compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */ 
    public function edit($id_siswa)
    {
        $siswa = Siswa::findOrFail($id_siswa);
        $sekolah = DB::table('users')->where('role','sekolah')->get();
        $magang = DB::table('users')->where('role','magang')->get();
        $jurusan = Kelas::all();
        return view('admin.siswa.editsiswa',compact('siswa','sekolah','jurusan','magang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $id_siswa)
    {
        $data = Siswa::findOrFail($id_siswa);
        $input = $request->all();

        if($request->hasFile('foto')){

            //hapus foto lama jika ada foto baru
            $exist = Storage::disk('foto')->exists($data->foto_user);
            if(isset($data->foto) && $exist){
                $delete = Storage::disk('foto')->delete($data->foto_user);
            }

            //upload foto baru
            $foto = $request->file('foto');
            $ext  = $foto->getClientOriginalExtension();
            if($foto->isValid()){
                $foto_name = date('YmdHis'). ".$ext";
                $upload_path = 'fotosiswa';
                $foto->move($upload_path, $foto_name);
                $input['foto'] =  $foto_name;
            }
            
        }
        
        $data->update($input);
    

        return redirect('DataSiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_siswa)
    {
        $siswa = Siswa::findOrFail($id_siswa);
        $siswa->delete();
        return redirect('DataSiswa');
    }

    // public function qrcode($id_siswa)
    // {
        
    //     $siswa = Siswa::findOrFail($id_siswa);
    //     return view ('admin.siswa.print');
    // }
}
