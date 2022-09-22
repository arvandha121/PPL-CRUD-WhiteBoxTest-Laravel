<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout', function (Blueprint $table) {
            $table->bigIncrements('id_checkout');
            $table->unsignedBigInteger('barang_id')->unsigned();
            $table->integer('jumlah');
            $table->integer('jumlah_harga');
            $table->foreign('barang_id')->references('id_sepatu')->on('sepatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkout');
        $table->dropForeign(['barang_id']);
    }
}
