<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{asset ('assets/img/logo/logo1.png')}}" rel="icon">
  <title>AbsenPKL</title>
  <link href="{{asset ('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset ('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset ('assets/css/ruang-admin.min.css')}}" rel="stylesheet">
  <link href="{{asset ('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

  <!-- notifications CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset ('assets/css/notifications/Lobibox.min.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/css/notifications/notifications.css')}}">
    
    <link rel="stylesheet" href="{{asset ('assets/css/select2/select2.min.css')}}">
    <!-- chosen CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset ('assets/css/chosen/bootstrap-chosen.css')}}">
  
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon">
          <img src="{{ asset('/assets/img/logo/logo1.png')}}">
        </div>
        <div class="sidebar-brand-text mx-3">AbsenPKL SMKN 1 Sumenep</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Siswa</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Siswa</h6>
            @if(auth()->user()->role == 'admin')
            <a class="collapse-item" href="{{url ('/DataSiswa')}}">Data Siswa</a>
            <a class="collapse-item" href="{{url ('/DataKelas')}}">Data Kelas</a>
            @endif
            @if(auth()->user()->role == 'sekolah')
            <a class="collapse-item" href="{{url ('AbsenSiswaMagang')}}">Data Siswa Absen</a>
            @endif
            @if(auth()->user()->role == 'magang')
            <a class="collapse-item" href="{{url ('SiswaMagang')}}">Data Siswa</a>
            @endif
          </div>
        </div>
      </li>
      @if(auth()->user()->role == 'admin')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-users"></i>
          <span>User</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User</h6>
            <a class="collapse-item" href="{{url ('/DataUser')}}">Data User</a>
          </div>
        </div>
      </li>
      @endif
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{ asset('/assets/img/boy.png')}}" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">{{auth()->user()->name}}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('name0')</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">@yield('name1')</li>
              <li class="breadcrumb-item active" aria-current="page">@yield('name2')</li>
            </ol>
          </div>

         
            <!-- Earnings (Monthly) Card Example -->
            
            <!-- Area Chart -->
            
            <!-- Pie Chart -->
            @yield('menu')
            <!-- Invoice Example -->
           
            <!-- Message From Customer-->
            
         
          <!--Row-->

          

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer --><br>
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">Smk Negeri 1 Sumenep</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="{{asset ('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset ('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset ('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset ('assets/js/ruang-admin.min.js')}}"></script>
  <script src="{{asset ('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset ('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset ('assets/js/notifications/Lobibox.js')}}"></script>
  <script src="{{asset ('assets/js/notifications/notification-active.js')}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="{{asset ('assets/js/chosen/chosen.jquery.js')}}"></script>
    <script src="{{asset ('assets/js/chosen/chosen-active.js')}}"></script>
    <!-- select2 JS
		============================================ -->
    <script src="{{asset ('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset ('assets/js/select2/select2-active.js')}}"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

</body>

</html>