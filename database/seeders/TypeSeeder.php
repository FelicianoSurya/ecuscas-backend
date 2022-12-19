<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisBarang;

class TypeSeeder extends Seeder
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
                'name' => 'Samsung Galaxy Nova',
                'tinggi' => 10.00,
                'panjang' => 5.00,
                'lebar' => 1.2,
                'id_kategori' => 1,
            ],
            [
                'name' => 'OPPO A9 2020',
                'tinggi' => 5.00,
                'panjang' => 2.00,
                'lebar' => 1,
                'id_kategori' => 1,
            ],
            [
                'name' => 'Iphone 13 Pro Max',
                'tinggi' => 7.00,
                'panjang' => 3.00,
                'lebar' => 1,
                'id_kategori' => 1,
            ],
            [
                'name' => 'Samsung Galaxy NoteBook',
                'tinggi' => 10.00,
                'panjang' => 6.00,
                'lebar' => 1.3,
                'id_kategori' => 4,
            ],
            [
                'name' => 'Samsung Galaxy Zen',
                'tinggi' => 12.00,
                'panjang' => 4.00,
                'lebar' => 1,
                'id_kategori' => 4,
            ],
            [
                'name' => 'Samsung Galaxy Mi Band',
                'tinggi' => 12.00,
                'panjang' => 7.00,
                'lebar' => 1.5,
                'id_kategori' => 4,
            ],
            [
                'name' => 'Samsung',
                'tinggi' => 15.00,
                'panjang' => 10.00,
                'lebar' => 2,
                'id_kategori' => 6,
            ],
            [
                'name' => 'LG',
                'tinggi' => 12.00,
                'panjang' => 9.00,
                'lebar' => 1.5,
                'id_kategori' => 4,
            ],
            [
                'name' => 'HP',
                'tinggi' => 12.00,
                'panjang' => 5.00,
                'lebar' => 1.3,
                'id_kategori' => 4,
            ],
            [
                'name' => 'LG',
                'tinggi' => 8.00,
                'panjang' => 4.00,
                'lebar' => 1.5,
                'id_kategori' => 6,
            ],
            [
                'name' => 'HP',
                'tinggi' => 9.00,
                'panjang' => 7.00,
                'lebar' => 1.5,
                'id_kategori' => 6,
            ],
            [
                'name' => 'ASUS',
                'tinggi' => 12.00,
                'panjang' => 7.00,
                'lebar' => 1.5,
                'id_kategori' => 6,
            ],
            [
                'name' => 'ASUS ROG',
                'tinggi' => 12.00,
                'panjang' => 7.00,
                'lebar' => 1.5,
                'id_kategori' => 2,
            ],
            [
                'name' => 'LG 202',
                'tinggi' => 200,
                'panjang' => 100,
                'lebar' => 50,
                'id_kategori' => 3,
            ],
            [
                'name' => 'ASUS CAS X',
                'tinggi' => 20.00,
                'panjang' => 20.00,
                'lebar' => 8,
                'id_kategori' => 7,
            ],
            [
                'name' => 'Oven GG Gaming',
                'tinggi' => 12.00,
                'panjang' => 7.00,
                'lebar' => 1.5,
                'id_kategori' => 8,
            ],
        ];
        foreach($data as $key => $value){
            JenisBarang::create($value);
        }
    }
}
