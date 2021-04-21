@extends('../template/sidebar')
@section('name0','Dashboard')
@section('name1','Home')
@section('name2','Dashboard')
@section('menu')

@if(auth()->user()->role == 'admin')
<div class="row mb-3">
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">User</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$countuser}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                        <span>Since last month</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Siswa</div>
                      
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$countsiswa}}</div>
                    
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                        <span>Since last month</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>
<div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">DAFTAR SISWA</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Tempat PKL</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Tempat PKL</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($siswa as $data)
                      <tr>
                        <td>{{$data->nis}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->kelas}}</td>
                        <td>{{$data->jurusan}}</td>
                        <td>{{$data->tempat_pkl}}</td>
                      </tr>
                      @endforeach
                    </tbody>  
                  </table>
                </div>
              </div>
            </div>
            @endif
            @if(auth()->user()->role =='magang')
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">DAFTAR ABSEN SISWA</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                      <th>Nama</th>
                        <th>Lokasi</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>SIA</th>
                        <th>Laporan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nama</th>
                        <th>Lokasi</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>SIA</th>
                        <th>Laporan</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                     @foreach($absenhariini as $data1)
                     <tr>
                        <td>{{$data1->nama}}</td>
                        <td>{{$data1->lokasi}}</td>
                        <td>{{$data1->tanggal_absen}}</td>
                        <td>{{$data1->jam}}</td>
                        <td>{{$data1->SIA}}</td>
                        <td>{{$data1->laporan}}</td>
                        <td>
                          <button type="button" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#ModalSetuju{{$data1->id_absen}}"
                            id="#modalCenter"><span class="icon text-white-50">
                            <i class="fa fa-check-square">Setujui</i></button>
                            <button type="button" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#ModalDitolak{{$data1->id_absen}}"
                            id="#modalCenter"><span class="icon text-white-50">
                            <i class="fa fa-times-circle">Tolak</i></button>
                        </td> 
                      </tr>
                      <!--  Setuju-->
                      <div class="modal fade" id="ModalSetuju{{$data1->id_absen}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fa fa-check-square"></i> Apakah Anda yakin ??</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{route ('dashboard.update', $data1->id_absen)}}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="modal-body">
                            <div class="form-group">
                              <input type="hidden" class="form-control" id="name" aria-describedby="emailHelp"
                              name ="laporan" value ="Disetujui">
                              <input type="hidden" class="form-control" id="name" aria-describedby="emailHelp"
                              name ="status" value ="1">
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
                       <!--  Ditolak-->
                       <div class="modal fade" id="ModalDitolak{{$data1->id_absen}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fa fa-times-circle"></i> Apakah Anda yakin ??</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{route ('dashboard.update', $data1->id_absen)}}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="modal-body">
                            <div class="form-group">
                              <input type="hidden" class="form-control" id="name" aria-describedby="emailHelp"
                              name ="laporan" value ="Ditolak">
                              <input type="hidden" class="form-control" id="name" aria-describedby="emailHelp"
                              name ="status" value ="2">
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
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            @endif
            @if(auth()->user()->role =='sekolah')
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">DAFTAR ABSEN SISWA</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Nama</th>
                        <th>Lokasi</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>SIA</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                      <th>Nama</th>
                        <th>Lokasi</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>SIA</th>
                        <th>Status</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    @foreach($viewabsen as $data1)
                     <tr>
                        <td>{{$data1->nama}}</td>
                        <td>{{$data1->lokasi}}</td>
                        <td>{{$data1->tanggal_absen}}</td>
                        <td>{{$data1->jam}}</td>
                        <td>{{$data1->SIA}}</td>
                        <td>{{$data1->laporan}}</td>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            @endif
@endsection