<?php

namespace App\Http\Controllers;

use App\Models\Sepatu;
use Illuminate\Http\Request;

class DashboardUser extends Controller
{
    public function tampilHome()
    {
        $data = Sepatu::all();

        return view('user.home', [
            'data' => $data,
            'title' => "Home User",
        ]);
    }
    public function detailSepatu($id)
    {
        $data = Sepatu::where('id_sepatu', $id)->first();
        // dd($data);
        return view('user.details', [
            'data' => $data,
            'title' => "Home User",
        ]);
    }
}
