@extends('../../template/sidebar')
@section('name0','Create Siswa')
@section('name1','Siswa')
@section('name2','Create Siswa')
@section('menu')
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <h5 class="card-title">Tambah Siswa</h5>
    <form action="/DataSiswa" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault01">NIS</label>
      <input type="text" class="form-control" name ="nis" id="validationDefault01" placeholder="Masukkan Nis" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationDefault02">Pembimbing Sekolah</label>
      <select class="form-control chosen-select" tabindex="-1" id="exampleFormControlSelect1" name="pembimbing_sekolah">
        <option>Pilih Pembimbing</option>
        @foreach ($sekolah as $data)
        <option value="{{$data->id}}">{{$data->name}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault01">Nama</label>
      <input type="text" class="form-control" name="nama" id="validationDefault01" placeholder="Masukkan Nama" required>
    </div>
    <div class="col-md-6 mb-3">
    <label for="validationDefault02">Pembimbing DU/DI</label>
      <select class="form-control chosen-select" tabindex="-1" id="exampleFormControlSelect1" name="pembimbing_magang">
        <option>Pilih Pembimbing</option>
        @foreach ($magang as $data)
        <option value="{{$data->id}}">{{$data->name}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault01">Jurusan</label>
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter"
                    id="#modalCenter">Tambah Jurusan</button>
      <select class="form-control chosen-select" tabindex="-1" id="exampleFormControlSelect1" name="jurusan">
        <option>Pilih Jurusan</option>
        @foreach ($jurusan as $datajurusan)
        <option value="{{$datajurusan->kelas}}">{{$datajurusan->kelas}}</option>
        @endforeach
      </select>
      </div>
    <div class="col-md-6 mb-3">
        <label for="exampleFormControlTextarea1">Alamat</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name = "alamat" rows="3"></textarea>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="validationDefault01">Kelas</label>
        <select class="form-control" id="exampleFormControlSelect1" name="kelas">
        <option>Pilih Kelas</option>
        <option value="XI">XI</option>
        <option value="XII">XII</option>
      </select>
       </div>
    <div class="col-md-6 mb-3">
        <label for="validationDefault01">Tempat PKL</label>
        <input type="text" class="form-control" name="tempat_pkl" id="validationDefault01" placeholder="Tempat PKL" required>
        
    </div>
  </div><br>
  <div class="form-row">
    <div class="col-md-6 mb-3">
            <div class="custom-file">
            <input type="file" name="foto" class="custom-file-input" id="customFile">
        <label class="custom-file-label" for="customFile">Input Foto</label>
        </div>
       </div>
    <div class="col-md-6 mb-3">
       <button type="submit" class="btn btn-success"><span class="icon text-white-50">
       <i class="fas fa-plus"></i>
        </span>Submit</button>
        <a href="/DataSiswa/" class="btn btn-danger btn-icon-split">
        <span class="icon text-white-50">
        <i class="fas fa-arrow-left"></i>
         </span>
         <span class="text">Kembali</span>
        </a>
  </div>
    </form>
  </div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Jurusan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <form action="/DataSiswa/tambah" method="POST">
                    @csrf
                <div class="form-group">
                      <label for="exampleInputEmail1">Jurusan</label>
                      <input type="text" class="form-control  @error('jurusan') is-invalid @enderror" id="kelas" aria-describedby="emailHelp"
                        placeholder="Input Jurusan" name ="kelas">
                        @error('kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                    </div> 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
              </div>
            </div>
          </div>
           </div>
@endsection