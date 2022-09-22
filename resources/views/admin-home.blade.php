@extends('layouts.appadmin')

@section('contentadmin')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-left: 258px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6"></div>
            <!-- /.col -->
            <div class="col-sm-12">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>SELAMAT DATANG ADMIN</h3>
                        <p>{{ Auth::user()->name }} | {{ Auth::user()->email }}</p>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <!-- /.content-header -->
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection