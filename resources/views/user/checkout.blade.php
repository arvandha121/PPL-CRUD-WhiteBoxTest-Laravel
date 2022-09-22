@extends('user.layouts.template')
@section('content')
<div class="cart-section mt-150 mb-150">

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">

                                <th class="product-image">gambar</th>
                                <th class="product-name">brand</th>
                                <th class="product-name">ukuran</th>
                                <th class="product-price">jumlah</th>
                                <th class="product-price">harga</th>
                                <th class="product-total">Harga Total</th>
                                <th class="product-total">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($cart as $isiKeranjang)
                            <tr>
                                <td>
                                    <img src="{{asset('gambar/'.$isiKeranjang->Sepatu->gambar)}}" width="100" height="65" alt="...">
                                </td>
                                <td>{{ $isiKeranjang->Sepatu->brand }}</td>
                                <td> {{ number_format($isiKeranjang->Sepatu->ukuran ) }}</td>
                                <td>{{ $isiKeranjang->jumlah }}</td>
                                <td>Rp {{ number_format($isiKeranjang->Sepatu->harga ) }}</td>
                                <td>Rp. {{ number_format($isiKeranjang->jumlah_harga) }}</td>
                                <td>
                                    <form action="{{ url('cart') }}/{{ $isiKeranjang->id_checkout }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="bi bi-trash"></i>Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="total-section">
                    <table class="total-table">
                        <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Total</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="total-data">
                                <td><strong>Total: </strong></td>
                                <td>Rp.</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-buttons">
                        <a href="#" class="boxed-btn black">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection