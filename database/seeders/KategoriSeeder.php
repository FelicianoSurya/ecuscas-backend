<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
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
                'name' => 'Handphone',
                'image' => 'handphone.jpg',
            ],
            [
                'name' => 'Laptop',
                'image' => 'Laptop.jpg',
            ],
            [
                'name' => 'Kulkas',
                'image' => 'Kulkas.jpg',
            ],
            [
                'name' => 'Tablet',
                'image' => 'Tablet.jpg',
            ],
            [
                'name' => 'Monitor',
                'image' => 'Monitor.jpg',
            ],
            [
                'name' => 'Televisi',
                'image' => 'Televisi.jpg',
            ],
            [
                'name' => 'CPU',
                'image' => 'CPU.jpg',
            ],
            [
                'name' => 'Oven',
                'image' => 'Oven.jpg',
            ],
        ];

        foreach($data as $key=>$value){
            Kategori::create($value);
        }
    }
}
