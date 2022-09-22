@extends('user.layouts.template')

@section('content')
<div class="shoeList">
    <h3 class="title mb-5">Daftar Sepatu</h3>
    <div class="row">
        @foreach ($data as $spt)
        <div class="col-4 mb-5">
            <div class="item card">
                <img class="card-img-top" src="/gambar/{{ $spt->gambar }}" alt="GambarSepatu">
                <div class="card-body">
                    <h5 class="card-title"> {{ $spt->brand }} </h5>
                    <p class="card-text"> {{ $spt->warna }} </p>
                    <a href="home/{{$spt->id_sepatu}}" class=" btn btn-primary">Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection()