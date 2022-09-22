<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiSepatuUkuranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('sepatu', function (Blueprint $table) {
        //     $table->dropColumn('ukuran');
        //     $table->unsignedBigInteger('ukuran_id')->nullable();
        //     $table->foreign('ukuran_id')->references('id_ukuran')->on('ukuran');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sepatu', function (Blueprint $table) {
            // $table->string('ukuran');
            // $table->dropForeign(['ukuran_id']);
        });
    }
}
