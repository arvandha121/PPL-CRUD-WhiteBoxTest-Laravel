@extends('layouts.master')
@section('product')
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">TokoSepatu.Com</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('assets/dist/img/avatar.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">

      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{ route('sepatu.index')}}" class="nav-link active">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Product
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('pelanggan.index') }}" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              User
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('transaksi.index') }}" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Transaksi
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-left"></i> {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<div class="content-wrapper" style="min-height: 1302.12px;">
  <section class="content" style="padding-top: 10px;">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <a href="/sepatu/create" class="btn btn-warning"><i class="fa fa-plus"></i> Tambah Data</a>
          <a href="{{ route('cetak_pdf') }}" class="btn btn-info"><i class="fa fa-print"></i> Cetak Data</a>
        </div>

        <div class="card-body">
          <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Brand</th>
                  <th>Ukuran</th>
                  <th>Warna</th>
                  <th>Harga</th>
                  <th>Gambar</th>
                  <th width="20%" class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $dt)
                <tr>
                  <td>{{ $dt->brand }}</td>
                  <td>{{ $dt->ukuran }}</td>
                  <td>{{ $dt->warna }}</td>
                  <td>{{ $dt->harga }}</td>
                  <td>
                    <center>
                      <img width="150px" src="/gambar/{{ $dt->gambar }}">
                    </center>
                  </td>
                  <td class="d-flex justify-content-evenly">
                    <a href="sepatu/{{ $dt->id_sepatu }}" class="btn btn-primary btn-sm mr-2">Show</a>
                    <a href="sepatu/{{ $dt->id_sepatu }}/edit" class="btn btn-warning btn-sm mr-2">Edit</a>
                    <form action="sepatu/{{ $dt->id_sepatu }}" method="POST">
                      @method('delete')
                      @csrf
                      <button class="btn btn-danger btn-sm" onclick="return confirm('beneran mau hapus?')">Hapus</button>
                    </form>
                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>
            <br />
            Halaman : {{ $data->currentPage() }} <br />
            {{ $data->links() }}
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="modalAddLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Brand</label>
          <input type="text" id="brand" name="brand" class="form-control" placeholder="ex : Adidas" required>
        </div>
        <div class="form-group">
          <label>Warna</label>
          <input type="text" id="warna" name="warna" value="" class="form-control" placeholder="ex : Black">
        </div>
        <!-- </div> -->
        <!-- <div class="modal-body"> -->

        <div class="form-group">
          <label>Harga</label>
          <input type="text" id="harga" name="harga" value="" class="form-control" placeholder="ex : 312.000">
        </div>
        <!-- </div> -->
        <!-- <div class="modal-body"> -->
        <!-- <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" id="gambar" class="form-control" placeholder="" required style="padding:3px;">
                </div> -->

      </div>
      <div class="modal-footer">
        <button id="addData" class="btn btn-warning"><i class="fa fa-paper-plane mr-1"></i>Tambah</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')

  $(document).on('click', '#addData', function() {
    var brand = $('#brand').val()
    var warna = $('#warna').val()
    var ukuran = $('#ukuran').val()
    var harga = $('#harga').val()
    var gambar = $('#gambar').val()
    if (brand == '') {
      alert('Nama Brand harus diisi')
      $('#brand').focus()
    } else if (warna == '') {
      alert('Warna harus diisi')
      $('#warna').focus()
    } else if (ukuran == '') {
      alert('Ukuran harus diisi')
      $('#ukuran').focus()
    } else if (harga == '') {
      alert('Harga harus diisi')
      $('#harga').focus()
      // } else if (gambar == '') {
      //     alert('Gambar harus diisi')
      //     $('#gambar').focus()
    } else {
      $.ajax({
        type: 'POST',
        url: '{{ route("sepatu.store") }}',
        data: {
          _token: CSRF_TOKEN,
          'brand': brand,
          'warna': warna,
          'ukuran': ukuran,
          'harga': harga,
          'gambar': gambar,

        },
        dataType: 'json',
        beforeSend: function() {
          $('#addData').prop('disabled', true);
        },
        success: function(result) {
          if (result.success == true) {
            console.log(result);
            Swal.fire({
              icon: 'success',
              title: 'BERHASIL',
              text: result.msg
            })
            setTimeout(function() {
              location.reload()
            }, 500)
          } else {
            alert('Gagal Tambah Data')
          }
        }
      })
    }
  })
</script>
@endsection