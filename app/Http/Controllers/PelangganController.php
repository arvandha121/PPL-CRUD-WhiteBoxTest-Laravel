<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function halamanPelanggan()
    // {
    //     $user = User::with('Pelanggan')->get();
    //     return view('pelanggan.index', ['users' => $user]);
    // }

    // public function halamanPelanggan()
    // {
    //     $pelanggan = User::with('Pelanggan')->get();
    //     return view('pelanggan.index', ['users' => $pelanggan]);
    // }

    public function index()
    {
        // mengambil data dari tabel sepatu
        // $data = User::all();

        // menampilkan kembali ke halaman index dengan memberikan variabel bernama data, yang mana isi dari variabel ata adalah data semua sepatu
        return view('pelanggan.index', [
            // 'data' => $data,
            'data' => DB::table('Users')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $pelanggan = Pelanggan::all();
        // return view('pelanggan.create', ['pelanggan' => $pelanggan]);
        $pelanggan = User::all();
        return view('pelanggan.create', ['pelanggan' => $pelanggan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $pelanggan = $request->id_users;
        // if ($request->role == 0) {
        //     $pelanggan = new Pelanggan;
        //     $pelanggan->nama = $request->nama;
        //     $pelanggan->email = $request->email;
        // }


        $pelanggan = new User; //inisialisasi bentuk object variabel pelanggan

        // -- masukkan isi variabel
        // $pelanggan->id_users = $request->get('id_users');
        $pelanggan->nama = $request->get('nama');
        $pelanggan->email = $request->get('email');
        $pelanggan->role = $request->get('role');
        $pelanggan->password = $request->get('password');
        $pelanggan->password = Hash::make($pelanggan->password);

        // $pelanggan->harga = $request->get('harga');
        // --

        // proses simpan
        $pelanggan->save();

        return view('pelanggan.index', [
            'data' => User::all(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $pelanggan = user::where('id_users', $id)->first();


        return view('pelanggan.edit', [
            'pelanggan' => $pelanggan,
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
        // penyimpanan data sementara di array dengan nama newUpdateData
        $newUpdateData = ([
            'id_users' => $request->id_users,
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        // proses update
        User::where('id_users', $newUpdateData['id_users'])->update($newUpdateData);

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('pelanggan.index')
            ->with('success', 'User Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //proses hapus dengan keterangan id adalah id seperti yang dicantumkan pada parameter ($id)
        User::where('id_users', $id)->delete();
        return redirect()->route('pelanggan.index')
            ->with('success', 'Users Berhasil Dihapus');
    }
}
