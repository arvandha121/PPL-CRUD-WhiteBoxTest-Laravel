<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SepatuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sepatu = [
            [
                'brand' => 'Converse',
                'ukuran' => '42',
                'warna' => 'Hitam-Putih',
                'harga' => 400000,
                'gambar' => ' ',
            ],
            [
                'brand' => 'Patrobas',
                'ukuran' => '40',
                'warna' => 'Merah',
                'harga' => 250000,
                'gambar' => ' ',
            ],
            [
                'brand' => 'Ventela',
                'ukuran' => '42',
                'warna' => 'Putih',
                'harga' => 300000,
                'gambar' => ' ',
            ],
        ];
        DB::table('sepatus')->insert($sepatu);
    }
}
