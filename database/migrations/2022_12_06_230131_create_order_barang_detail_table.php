<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderBarangDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_barang_detail', function (Blueprint $table) {
            $table->id();
            $table->string('kode_order');
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('jumlah');
            $table->string('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_barang_detail');
    }
}
