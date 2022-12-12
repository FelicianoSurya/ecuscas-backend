<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Stiker Lolipop Gantung Atas',
                'harga' => 20000,
                'jumlah' => 30,
                'image' => 'stiker_lolipop.jpg'
            ],
            [
                'name' => 'Aksesoris belakang pegangan HP',
                'harga' => 30000,
                'jumlah' => 30,
                'image' => 'stiker_lolipop.jpg'
            ],
            [
                'name' => 'Miniatur tempel atas spongebob',
                'harga' => 50000,
                'jumlah' => 30,
                'image' => 'stiker_lolipop.jpg'
            ],
            [
                'name' => 'Stiker Avanger',
                'harga' => 15000,
                'jumlah' => 2,
                'image' => 'stiker_lolipop.jpg'
            ],
            [
                'name' => 'Stiker Anya',
                'harga' => 25000,
                'jumlah' => 10,
                'image' => 'stiker_lolipop.jpg'
            ],
            [
                'name' => 'Miniatur Anya',
                'harga' => 100000,
                'jumlah' => 5,
                'image' => 'stiker_lolipop.jpg'
            ],
            [
                'name' => 'Gantungan Anya',
                'harga' => 30000,
                'jumlah' => 10,
                'image' => 'stiker_lolipop.jpg'
            ],
            [
                'name' => 'Kepala handphone Anya',
                'harga' => 150000,
                'jumlah' => 10,
                'image' => 'stiker_lolipop.jpg'
            ],
            [
                'name' => 'Stiker Spongebob',
                'harga' => 10000,
                'jumlah' => 30,
                'image' => 'stiker_lolipop.jpg'
            ],
            [
                'name' => 'Casing Avanger',
                'harga' => 70000,
                'jumlah' => 15,
                'image' => 'stiker_lolipop.jpg'
            ],
        ];
        foreach($data as $key => $value){
            Product::create($value);
        }
    }
}
