@extends('../../template/sidebar')
@section('name0','Data Kelas')
@section('name1','Kelas')
@section('name2','Data Kelas')
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
                  <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#exampleModalCenter"
                    id="#modalCenter"><span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data Jurusan</span></button>
                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Delete">
                    Delete Modal </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Danger">
                    Danger Modal </button> -->
                  <br>
                  <br>
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Jurusan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                      <th>No</th>
                        <th>Jurusan</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($kelas as $data)
                      <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{$data->kelas}}</td> 
                        <td>
                          <button type="button" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#ModalUpdate{{$data->id_kelas}}"
                            id="#modalCenter"><span class="icon text-white-50">
                            <i class="far fa-edit"></i></button>
                            <button type="button" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#ModalDelete{{$data->id_kelas}}"
                            id="#modalCenter"><span class="icon text-white-50">
                            <i class="far fa-trash-alt"></i></button>
                        </td>   
                      </tr>
                    <!-- Modal Update -->
                    
                    <div class="modal fade" id="ModalUpdate{{$data->id_kelas}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Edit Jurusan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{route ('DataKelas.update', $data->id_kelas)}}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="modal-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Jurusan</label>
                              <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                placeholder="Input Jurusan" name ="kelas" value ="{{$data->kelas}}">
                            </div> 
                            </div>
                            <div class="modal-footer">
                              <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      </div>
                      <!--  -->
                        <!-- Modal Delete -->
                        <div class="modal fade" id="ModalDelete{{$data->id_kelas}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle"><i class="far fa-trash-alt"></i> Apakah Anda yakin ??</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="/DataKelas/{{ $data->id_kelas }}" method="POST">
                            @csrf
                            @method('delete')
                           
                            <div class="modal-footer">
                              <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Delete</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      </div>
                        <!--  -->
                     @endforeach
                    </tbody>
                  </table>
                  
                </div>
                
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