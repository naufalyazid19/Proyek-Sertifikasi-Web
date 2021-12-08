<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  @include('Template.head') 
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('Template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('Template.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Data Gambar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="card card-info card-outline">
        <div class="card-header">
          <div class="card-tools">
            <a href="{{route('create-gambar')}}" class="btn btn-success ">Tambah Gambar &nbsp&nbsp<i class="fas fa-plus"></i></a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tr>
            <th>Nomor</th>
            <th>Nama Gambar</th>
            <th>Gambar</th>
            <th>Aksi</th>
            
          </tr>
          @foreach ($dtgambar as $item)
          <tr>
            <td>{{$loop -> iteration}}</td>
            <td>{{$item -> nama}}</td>
            <td>
            <img src="{{asset('img/'.$item->gambar)}}" height="300px" alt="">
            </td>
            <td>
            <a href="{{ url('edit-gambar', $item->id)}}"><i class="far fa-edit"></i></a> 
            | 
            <a href="{{ url('delete-gambar', $item->id)}}"><i class="far fa-trash-alt" style="color:red"></i></a>
          </tr>
          @endforeach
        </table>
        <div class="card-footer">
              
        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    @include ('Template.footer')
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
@include ('Template.script')
</body>
</html>
