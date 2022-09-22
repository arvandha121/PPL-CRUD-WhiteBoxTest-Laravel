@extends('layouts.master')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Sepatu
            </div>
            <div class="card-body">
                <form action="/sepatu/{{ $sepatu->id_sepatu }}" method="post" id="myForm" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id_sepatu" value="{{ $sepatu->id_sepatu }}">
                    <div class=" form-group">
                        <label for="brand">brand</label>
                        <input type="text" name="brand" class="form-control" id="brand" value="{{ $sepatu->brand }}">
                    </div>
                    <div class="form-group">
                        <label for="ukuran">Ukuran</label>
                        <input type="number" name="ukuran" class="form-control" id="ukuran" value="{{ $sepatu->ukuran }}">
                    </div>
                    <div class="form-group">
                        <label for="warna">Warna</label>
                        <input type="text" name="warna" class="form-control" id="warna" value="{{ $sepatu->warna }}">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" class="form-control" id="harga" value="{{ $sepatu->harga }}">
                    </div>
                    <div>
                        <label for="gambar">Gambar: </label><br>
                        <center>
                            <img width="250px" src="/gambar/{{ $sepatu->gambar }}" class="mb-3"><br>
                        </center>
                        <input type="file" name="gambar" class="form-control" id="gambar" required="required" value="{{ $sepatu->gambar }}"></br>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Edit"></input>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection