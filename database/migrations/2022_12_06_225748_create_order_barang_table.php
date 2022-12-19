<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_order');
            $table->unsignedBigInteger('id_user');
            $table->float('voucher');
            $table->string('pembayaran');
            $table->float('ongkir');
            $table->string('diskon');
            $table->string('harga');
            $table->string('harga_total');
            $table->string('address');
            $table->enum('status',['konfirmasi_pembayaran','pesanan_diterima','progress','pengiriman','order_selesai'])->default('konfirmasi_pembayaran');

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
        Schema::dropIfExists('order_barang');
    }
}
