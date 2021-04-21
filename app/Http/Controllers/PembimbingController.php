<?php

namespace App\Http\Controllers;

use Validator;
use App\Pembimbing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PembimbingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Pembimbing::all();
      return view ('admin/user/datauser',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin/user/createuser');
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
        $data['password'] = bcrypt($data['password']);
        $user = Pembimbing::Create($data);
        return redirect ('/DataUser')->with('success',"$user->name Berhasil Ditambahkan !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembimbing  $pembimbing
     * @return \Illuminate\Http\Response
     */
    public function show(Pembimbing $pembimbing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembimbing  $pembimbing
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pembimbing::findOrFail($id);
        return view('admin.user.edituser',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembimbing  $pembimbing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = Pembimbing::findOrFail($id);

        $data->update($request->all());
        return redirect('/DataUser')->with('success',"$data->name Berhasil Di Ubah !");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembimbing  $pembimbing
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= Pembimbing::findOrFail($id);
        $user->delete();
        return redirect('/DataUser')->with('delete',"$user->name Berhasil Dihapus !");
    }
}
