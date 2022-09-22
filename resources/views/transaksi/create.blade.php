@extends('layouts.master')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Transaksi
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="/transaksi" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <!-- <div class="form-group">
                        <label for="Id">Id</label>
                        <input type="text" name="Id" class="form-control" id="Id" aria-describedby="Id">
                    </div> -->
                    <div class="form-group">
                        <label for="sepatus">Sepatu</label>
                        <input type="text" name="sepatu" class="form-control" id="sepatu" aria-describedby="sepatu">
                    </div>
                    <div class="form-group">
                        <label for="users">Pengguna</label>
                        <input type="text" name="users" class="form-control" id="users" aria-describedby="users">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" aria-describedby="tanggal">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">jumlah</label>
                        <input type="number" name="jumlah" class="form-control" id="jumlah" aria-describedby="jumlah">
                    </div>
                    <div class="form-group">
                        <label for="total_harga">totalHarga</label>
                        <input type="number" name="total_harga" class="form-control" id="total_harga" aria-describedby="total_harga">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection