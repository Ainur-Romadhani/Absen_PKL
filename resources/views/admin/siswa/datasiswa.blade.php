@extends('../../template/sidebar')
@section('name0','Data Siswa')
@section('name1','Siswa')
@section('name2','Data Siswa')
@section('menu')

<div class="col-lg-12">
<div class="card-body">
               @if(session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h6><i class="fas fa-check"></i><b> Success  {{session('success')}}</b></h6>
                  </div>
                @endif

               @if(session('delete'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h6><i class="fas fa-trash"></i><b>  {{session('delete')}}</b></h6>
                  </div>
              @endif

                <a href="/DataSiswa/create/" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data Siswa</span>
                  </a>
                  <br>
                  <br>
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr> 
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @foreach($siswa as $data)
                      <tr>
                        <td>{{ $data->nis }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->kelas }}</td>
                        <td>{{ $data->jurusan }}</td>
                        <td><a href="{{route ('DataSiswa.edit',$data->id_siswa) }}" class="btn btn-info btn-icon-split">
                            <span class="icon text-white-50">
                            <i class="far fa-edit"></i>
                            </span>
                          </a>
                         <a href="{{route ('DataSiswa.show',$data->id_siswa) }}" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                            <i class="fa fa-print"></i>Print Barcode
                            </span>
                          </a>
                          <form action="/DataSiswa/{{ $data->id_siswa }}" method="post" class="d-inline">
                              @method('delete')
                                @csrf
                              <button type="submit" class="btn btn-danger btn-icon-split">
                                  <span class="icon text-white-50">
                                  <i class="far fa-trash-alt"></i>
                                  </span>
                            </form>
                        </td>   
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  
                </div>
                
              </div>
            </div>
            
@endsection