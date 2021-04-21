@extends('../../template/sidebar')
@section('name0','Edit User')
@section('name1','User')
@section('name2','Edit User')
@section('menu')
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <h5 class="card-title">Tambah User</h5>
    <form action="{{route ('DataUser.update', $data->id)}}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                        placeholder="Masukkan Username" name ="name" value = "{{$data->name}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Masukkan email" name="email" value = "{{$data->email}}">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="role" value = "{{$data->role}}">
                                <option value="sekolah">Pembimbing Sekolah</option>
                                <option value="magang">Pembimbing DU/DI</option>
                            </select>
                        </div> 
                    
                      <input type="hidden" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="{{$data->password}}">
                    
                    <button type="submit" class="btn btn-success"><span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>Submit</button>
                    <a href="/DataUser/" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Kembali</span>
                  </a>
                  </form>
  </div>
</div>
@endsection