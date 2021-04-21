<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Absensi;
use App\Pembimbing;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $siswa =Siswa::all();
        $now = Date('Y-m-d');
        $absenhariini = Absensi::join('siswa','absensi.id_siswa','=','siswa.id_siswa')
        ->where('id',\Auth::user()->id)->where('tanggal_absen','=',Date($now))->get();

        $allabsen =  Absensi::join('siswa','absensi.id_siswa','=','siswa.id_siswa')
        ->where('id',\Auth::user()->id)->get();

        $viewdataabsen = Siswa::join('absensi','siswa.id_siswa','=','absensi.id_siswa')
        ->where('pembimbing_sekolah',\Auth::user()->id)->get();

        $viewabsen = Siswa::join('absensi','siswa.id_siswa','=','absensi.id_siswa')
        ->where('pembimbing_sekolah',\Auth::user()->id)->where('status','=','0')->get();

        $countsiswa = Siswa::all()->count();
        $countuser = Pembimbing::all()->count();

        return view ('admin/dashboard',compact('siswa','absenhariini','allabsen','viewabsen',
        'viewdataabsen','countsiswa','countuser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_absen)
    {
        $data = Absensi::findOrFail($id_absen);
        $data->update($request->all());

        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
