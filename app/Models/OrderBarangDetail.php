<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBarangDetail extends Model
{
    use HasFactory;

    protected $table = 'order_barang_detail';

    protected $fillable = ['id_barang','jumlah','harga'];

    public function barang(){
        return $this->belongsTo(Product::class, 'id_barang','id');
    }
}
