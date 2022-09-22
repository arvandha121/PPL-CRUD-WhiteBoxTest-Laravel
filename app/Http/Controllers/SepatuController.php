<?php

namespace App\Http\Controllers;

use App\Models\Sepatu;
use App\Models\checkout;
use App\Models\Ukuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use PDF;

class SepatuController extends Controller
{
   public function index()
   {
      // mengambil data dari tabel sepatu
      // $data = Sepatu::all();

      // menampilkan kembali ke halaman index dengan memberikan variabel bernama data, yang mana isi dari variabel ata adalah data semua sepatu
      return view('sepatu.index', [
         // 'data' => $data,
         'data' => DB::table('sepatus')->paginate(5)
      ]);
   }
   public function create()
   {

      $ukuran = Ukuran::all();
      return view('sepatu.create', ['ukuran' => $ukuran]);
   }
   public function store(Request $request)
   {
      if ($request->file('gambar')) {
         $imageName = time() . '.' . $request->gambar->extension();
         $gambar = $imageName;
         $request->gambar->move(public_path('gambar'), $imageName);
      }

      Sepatu::create([
         'brand' => $request->brand,
         'warna' => $request->warna,
         'ukuran' => $request->ukuran,
         'harga' => $request->harga,
         'gambar' => $gambar,
      ]);

      return redirect()->route('sepatu.index')
         ->with('success', 'sepatu berhasil ditambahkan');
   }

   public function show($id)
   {
      //menampilkan detail data dengan menemukan/berdasarkan id Sepatu
      $sepatu = Sepatu::where('id_sepatu', $id)->first();
      // dd($sepatu);
      return view('sepatu.detail', ['Sepatu' => $sepatu]);
   }
   public function edit($id)
   {
      //mengambil data dengan keterangan dimana id sepatu adalah sesuai parameter yang dipasang pada alamt ($id)
      $sepatu = Sepatu::where('id_sepatu', $id)->first();


      return view('sepatu.edit', [
         'sepatu' => $sepatu,
      ]);
   }
   public function update(Request $request, $id)
   {

      $sepatu = Sepatu::where('id_sepatu', $id)->first();
      if ($request->file('gambar')) {
         $imageName = time() . '.' . $request->gambar->extension();
         $gambar = $imageName;
         $request->gambar->move(public_path('gambar'), $imageName);
      }

      // penyimpanan data sementara di array dengan nama newUpdateData
      $newUpdateData = ([
         'id_sepatu' => $request->id_sepatu,
         'brand' => $request->brand,
         'harga' => $request->harga,
         'warna' => $request->warna,
         'ukuran' => $request->ukuran,
         'gambar' => $gambar,


      ]);

      // proses update
      Sepatu::where('id_sepatu', $newUpdateData['id_sepatu'])->update($newUpdateData);

      //jika data berhasil diupdate, akan kembali ke halaman utama
      return redirect()->route('sepatu.index')
         ->with('success', 'Sepatu Berhasil Diupdate');
   }
   public function destroy($id)
   {

      //proses hapus dengan keterangan id adalah id seperti yang dicantumkan pada parameter ($id)
      Sepatu::where('id_sepatu', $id)->delete();
      return redirect()->route('sepatu.index')
         ->with('success', 'Sepatu Berhasil Dihapus');
   }
   public function pesan(Request $request, $id)
   {
      $barangs = Sepatu::where('id_sepatu', $id)->first();
      $tanggal = Carbon::now();


      // if ($request->jumlah_pesan > $barangs->stok) {
      //    return redirect('/sepatu' . $id);
      // }


      //$cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status_cart', 3)->first();

      // if (empty($cek_pesanan)) {
      //    $pesanans = new Pesanan;
      //    $pesanans->user_id = Auth::user()->id;
      //    $pesanans->tanggal = $tanggal;
      //    $pesanans->status_cart = 3;
      //    $pesanans->jumlah_harga = 0;
      //    $pesanans->kode = mt_rand(100, 999);
      //    $pesanans->save();
      // }

      // $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status_cart', 3)->first();

      $cek_pesanan_detail = checkout::where('barang_id', $barangs->id)->first();
      //->where('pesanan_id', $pesanan_baru->id_pesanans)->first();
      if (empty($cek_pesanan_detail)) {
         $cart = new checkout;
         $cart->barang_id = $barangs->id_sepatu;
         //$cart->pesanan_id = $pesanan_baru->id_pesanans;
         $cart->jumlah = $request->jumlah_pesan;
         $cart->jumlah_harga = $barangs->harga * $request->jumlah_pesan;
         //$cart->user_id = Auth::user()->id;
         $cart->save();
      } else {
         $cart = checkout::where('barang_id', $barangs->id)->first();
         //->where('pesanan_id', $pesanan_baru->id_pesanans)->first();
         $cart->jumlah = $cart->jumlah + $request->jumlah_pesan;

         $harga_pesanan_detail_baru = $barangs->harga * $request->jumlah_pesan;
         $cart->jumlah_harga = $cart->jumlah_harga + $harga_pesanan_detail_baru;
         $cart->update();
         //Alert::success('Pesanan Sukses Masuk Keranjang', 'Success');
      }

      //$pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status_cart', 3)->first();
      //$pesanans->jumlah_harga = $pesanans->jumlah_harga + $barangs->harga * $request->jumlah_pesan;
      //$pesanans->update();

      return redirect('cart');
   }

   public function cart()
   {
      //$pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status_cart', 3)->first();

      $cart = [];
      $cart = checkout::get();
      //$cart = checkout::all()->first();
      //dd($cart);
      //if (!empty($cart)) {

      //} else {
      //Alert::warning('Gagal', 'Masukkan Barang Dulu');
      // return back()->with('error', 'Keranjang Kosong');
      //}


      // if (!empty($pesanans)) {
      //    $cart = Cart::where('pesanan_id', $pesanans->id_pesanans)->get();
      // } else {
      //    Alert::warning('Gagal', 'Masukkan Barang Dulu');
      //    return back()->with('error', 'Keranjang Kosong');
      // }
      return view('user.checkout', compact('cart'));
   }

   public function delete($id)
   {

      $cart = checkout::all()->where('id_checkout', $id)->first();
      //dd($cart->id_checkout);

      //  $pesanans = Pesanan::where('id_pesanans', $cart->pesanan_id)->first();
      //  $pesanans->jumlah_harga = $pesanans->jumlah_harga-$cart->jumlah_harga;
      //  $pesanans->update();
      $cart->delete($cart);

      return redirect('cart');
   }

   public function cetak_pdf(){
      $sepatu = Sepatu::all();
      $pdf = PDF::loadview('sepatu.cetak_pdf',['sepatu'=>$sepatu]);
      return $pdf->stream();
   }
};
