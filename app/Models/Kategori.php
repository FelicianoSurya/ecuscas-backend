<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $fillable = ['name','image'];
    public $timestamps = false;

    public function jenis_barang(){
        return $this->hasMany(JenisBarang::class, 'id_kategori','id');
    }
}
