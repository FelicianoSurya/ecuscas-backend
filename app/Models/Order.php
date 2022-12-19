<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['id_user','id_kategori','pembayaran','aksesoris','ongkir','jenis_barang','warna','panjang','lebar','tinggi','gambar','bahan','address','diskon','keterangan','total_harga','gambar'];

 
    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    public function pembayaran(){
        return $this->belongsTo(Pembayaran::class, 'id_pembayaran','id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'id_aksesoris','id');
    }

    public function ongkir(){
        return $this->belongsTo(Ongkir::class, 'id_ongkir','id');
    }

    public $timestamps = false;
}
