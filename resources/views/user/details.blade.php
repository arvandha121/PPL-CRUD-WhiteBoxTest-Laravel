@extends('user.layouts.template')

@section('content')
<div class="card details">
    <div class="container-fliud">
        <div class="wrapper row">
            <div class="preview col-md-6">
                <img width=100% src="/gambar/{{ $data->gambar }}">
            </div>

            <div class="details col-md-6 p-4">
                <h1 class=" product-title">Adidas Type {{ $data->brand }}</h1>
                <p class="product-description">Warna: {{ $data->warna }} </p>
                <p class="product-description">Ukuran : {{ $data->ukuran }} </p>
                <h4 class="price">Harga: <span>{{ $data->harga }}</span></h4>

                <form method="post" action="{{ url('add-to-cart') }}/{{ $data->id_sepatu }}">
                    @csrf
                    <input type="text" name="jumlah_pesan" class="form-control" required="" style="border-radius: 50px;">


                    <br>
                    <a><button type="submit" class="cart-btn" style="display: inline-block;background-color: #F28123;color: #fff;padding: 10px 20px;border-radius: 50px;border-width: 0px;"><i class="fas fa-shopping-cart ">
                            </i> Add to Cart</button></a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>


@endsection