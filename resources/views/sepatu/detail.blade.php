@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail Sepatu
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Id: </b>{{$Sepatu->id_sepatu}}</li>
                    <li class="list-group-item"><b>Brand: </b>{{$Sepatu->brand}}</li>
                    <li class="list-group-item"><b>Ukuran: </b>{{$Sepatu->ukuran}}</li>
                    <li class="list-group-item"><b>Harga: </b>{{$Sepatu->harga}}</li>
                    <li class="list-group-item"><b>Gambar: </b><img width="150px" src="/gambar/{{ $Sepatu->gambar }}"></li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('sepatu.index') }}">Kembali</a>
            <!-- -->
        </div>
    </div>
</div>
@endsection