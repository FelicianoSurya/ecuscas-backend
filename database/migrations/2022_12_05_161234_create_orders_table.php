<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_kategori');
            $table->string('pembayaran');
            $table->string('aksesoris');
            $table->string('ongkir');
            $table->string('jenis_barang');
            $table->float('panjang');
            $table->float('lebar');
            $table->float('tinggi');
            $table->string('warna');
            $table->string('gambar');
            $table->string('bahan');
            $table->longText('keterangan');
            $table->string('address');
            $table->string('diskon');
            $table->string('total_harga');
            $table->enum('status',['konfirmasi_pembayaran','pesanan_diterima','progress','pengiriman','order_selesai'])->default('konfirmasi_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
