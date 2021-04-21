@extends('../../template/sidebar')
@section('name0','Edit Siswa')
@section('name1','Siswa')
@section('name2','Edit Siswa')
@section('menu')
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <h5 class="card-title">Update Siswa</h5>
    <form action="{{route ('DataSiswa.update', $siswa->id_siswa)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault01">NIS</label>
      <input type="text" class="form-control" name ="nis" value=" {{$siswa->nis}}" id="validationDefault01" placeholder="Masukkan Nis" required>
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
      <input type="text" class="form-control" value=" {{$siswa->nama}}" name="nama" id="validationDefault01" placeholder="Masukkan Nama" required>
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
      <a href="/DataKelas">(Tambah Jurusan)</a>
      <select class="form-control chosen-select" tabindex="-1" id="exampleFormControlSelect1" name="jurusan">
        <option>{{$siswa->jurusan}}</option>
        @foreach ($jurusan as $datajurusan)
        <option value="{{$datajurusan->id_kelas}}">{{$datajurusan->kelas}}</option>
        @endforeach
      </select>
      </div>
    <div class="col-md-6 mb-3">
        <label for="exampleFormControlTextarea1">Alamat</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" value="" name = "alamat" rows="2">{{$siswa->alamat}}</textarea>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="validationDefault01">Kelas</label>
        <select class="form-control" id="exampleFormControlSelect1" name="kelas">
        <option>{{$siswa->kelas}}</option>
        <option value="XI">XI</option>
        <option value="XII">XII</option>
      </select>
       </div>
    <div class="col-md-6 mb-3">
        <label for="validationDefault01">Tempat PKL</label>
        <input type="text" class="form-control" name="tempat_pkl" value=" {{$siswa->tempat_pkl}}" id="validationDefault01" placeholder="Tempat PKL" required>
        
    </div>
  </div><br>
  <div class="form-row">
    <div class="col-md-6 mb-3">
    <img width="80" height="80" src="{{ asset('fotosiswa/'. $siswa->foto) }}" alt=""><br>
    <br>
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
@endsection