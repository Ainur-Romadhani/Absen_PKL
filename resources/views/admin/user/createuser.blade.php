@extends('../../template/sidebar')
@section('name0','Create User')
@section('name1','User')
@section('name2','Create User')
@section('menu')
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <h5 class="card-title">Tambah User</h5>
    <form action="/DataUser" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                        placeholder="Masukkan Username" name ="name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Masukkan email" name="email">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="role">
                                <option>Pilih Role</option>
                                <option value="sekolah">Pembimbing Sekolah</option>
                                <option value="magang">Pembimbing DU/DI</option>
                            </select>
                        </div> 
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                    </div> 
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