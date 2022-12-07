<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $fillable = ['id_user','id_kategori','id_pembayaran','id_aksesoris','id_ongkir','jenis_barang','panjang','lebar','tinggi','warna','gambar','bahan','address','diskon','keterangan','total_harga'];

 
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
}
