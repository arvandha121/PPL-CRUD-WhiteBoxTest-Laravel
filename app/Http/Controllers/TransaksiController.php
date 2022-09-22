<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('transaksi.index');

        return view('transaksi.index', [
            // 'data' => $data,
            'data' => DB::table('Pesanan')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaksi = Transaksi::all();
        return view('transaksi.create', ['transaksi' => $transaksi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Transaksi::create([
            'sepatu' => $request->sepatu_id,
            'pelanggan' => $request->user_id,
            'tanggal' => $request->tangal,
            'jumlah' => $request->jumlah,
            'total_harga' => $request->total_harga,
        ]);
        return redirect()->route('transaksi.index')
            ->with('success', 'pemesanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail data dengan menemukan/berdasarkan id Sepatu
        $transaksi = Transaksi::where('id_pemesanan', $id)->first();
        // dd($sepatu);
        return view('transaksi.detail', ['transaksi' => $transaksi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //mengambil data dengan keterangan dimana id sepatu adalah sesuai parameter yang dipasang pada alamt ($id)
        $transaksi = Transaksi::where('id_transaksi', $id)->first();


        return view('transaksi.edit', [
            'transaksi' => $transaksi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newUpdateData = ([
            'id_transaksi' => $request->id_transaksi,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'total_harga' => $request->total_harga,
        ]);

        // proses update
        Transaksi::where('id_transaksi', $newUpdateData['id_transaksi'])->update($newUpdateData);

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('transaksi.index')
            ->with('success', 'transaksi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaksi::where('id_transaksi', $id)->delete();
        return redirect()->route('transaksi.index')
            ->with('success', 'Users Berhasil Dihapus');
    }
}
