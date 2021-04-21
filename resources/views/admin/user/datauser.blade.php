@extends('../../template/sidebar')
@section('name0','Data User')
@section('name1','User')
@section('name2','Data User')
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

                <a href="/DataUser/create/" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data User</span>
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
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @foreach ($user as $data)
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $data->name }}</td> 
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->role }}</td>
                        <td><a href="{{ route('DataUser.edit',$data->id) }} " class="btn btn-info btn-icon-split">
                            <span class="icon text-white-50">
                            <i class="far fa-edit"></i>
                            </span>
                          </a>
                          <form action="/DataUser/{{ $data->id }}" method="post" class="d-inline">
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