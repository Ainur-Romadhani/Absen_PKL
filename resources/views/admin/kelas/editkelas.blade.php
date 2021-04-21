@extends('../../template/sidebar')
@section('menu')
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <h5 class="card-title">Tambah Jurusan</h5>
    <form action="{{route ('DataKelas.update', $data->id_kelas)}}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jurusan</label>
                      <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                        placeholder="Input Jurusan" name ="kelas" value ="{{$data->kelas}}">
                    </div> 
                    <button type="submit" class="btn btn-success"><span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>Submit</button>
                    <a href="/DataKelas/" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Kembali</span>
                  </a>
                  </form>
  </div>
</div>
@endsection