@extends('../../template/sidebar')
@section('menu')
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <h5 class="card-title">Tambah Jurusan</h5>
    <form action="/DataKelas" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jurusan</label>
                      <input type="text" class="form-control  @error('kelas') is-invalid @enderror" id="kelas" aria-describedby="emailHelp"
                        placeholder="Input Jurusan" name ="kelas">
                        @error('kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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