@extends('../template/sidebar')
@section('name0','Data Absen Siswa')
@section('name1','Home')
@section('name2','Data Absen Siswa')
@section('menu')

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
                      </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($allabsen as $data1)
                      <tr>
                      <td>{{$data1->nama}}</td>
                        <td>{{$data1->lokasi}}</td>
                        <td>{{$data1->tanggal_absen}}</td>
                        <td>{{$data1->jam}}</td>
                        <td>{{$data1->SIA}}</td>
                        <td>{{$data1->laporan}}</td>
                      </tr>
                      @endforeach
                    </tbody>  
                  </table>
                </div>
              </div>
            </div>

@endsection