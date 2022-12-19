<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBarang extends Model
{
    use HasFactory;

    protected $table = 'order_barang';
    protected $fillable = ['kode_order','id_user','voucher','pembayaran','ongkir','diskon','ket','harga','harga_total','address','status'];

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
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
