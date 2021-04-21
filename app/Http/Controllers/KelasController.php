<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;
use Validator;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('admin/kelas.datakelas',compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'kelas' => 'required|unique:kelas,kelas',
        ]);

        if ($validator->fails()){
            return redirect('DataKelas/create')
                            ->withErrors($validator)
                            ->withInput();
        }

        Kelas::create($request->all());
        return redirect('/DataKelas')->with('success',"Data Berhasil Ditambahkan !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kelas)
    {
        $data = Kelas::findOrFail($id_kelas);
        return view ('admin.kelas.editkelas',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kelas)
    {
        $data = Kelas::findOrFail($id_kelas);
        $validator = Validator::make($request->all(),[
            'kelas' => 'required|unique:kelas,kelas',
        ]);

        if ($validator->fails()){
            return redirect('DataKelas/create')
                            ->withErrors($validator)
                            ->withInput();
        }

        $data->update($request->all());
        return redirect('/DataKelas')->with('success',"Data Berhasil Di Ubah !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kelas)
    {
        $kelas = Kelas::findOrFail($id_kelas);
        $kelas->delete();
        return redirect('/DataKelas')->with('delete',"Data Berhasil Di Hapus !");
    }
}
