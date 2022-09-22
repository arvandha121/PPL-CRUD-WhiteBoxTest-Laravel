<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UkuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ukuran = [
            ['ukuran_sepatu' => '36',],
            ['ukuran_sepatu' => '37',],
            ['ukuran_sepatu' => '38',],
            ['ukuran_sepatu' => '39',],
            ['ukuran_sepatu' => '40',],
            ['ukuran_sepatu' => '41',],
            ['ukuran_sepatu' => '42',],
            ['ukuran_sepatu' => '43',],
        ];
        DB::table('ukurans')->insert($ukuran);
    }
}
