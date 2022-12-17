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
                'image' => 'http://192.168.168.51:8000/storage/Images/Kategori/2f461e83-081f-4b71-a350-0a5afcdb68f4.jpg',
            ],
            [
                'name' => 'Laptop',
                'image' => 'http://192.168.168.51:8000/storage/Images/Kategori/laptop-terbaik-dunia-tahun-2020-versi-the-verge.png',
            ],
            [
                'name' => 'Kulkas',
                'image' => 'http://192.168.168.51:8000/storage/Images/Kategori/5c1b7297c878e.jpg',
            ],
            [
                'name' => 'Tablet',
                'image' => 'http://192.168.168.51:8000/storage/Images/Kategori/tcl-10-tabmax_169.jpeg',
            ],
            [
                'name' => 'Monitor',
                'image' => 'http://192.168.168.51:8000/storage/Images/Kategori/24MP400-B_ Monitor_D04.webp',
            ],
            [
                'name' => 'Televisi',
                'image' => 'http://192.168.168.51:8000/storage/Images/Kategori/Pengertian-Televisi.jpg',
            ],
            [
                'name' => 'CPU',
                'image' => 'http://192.168.168.51:8000/storage/Images/Kategori/CPU_RAKITAN_PC_INTEL_COREi5_DDR_8GB_HDD_500GB_VGA_R7_250_2GB.jpg',
            ],
            [
                'name' => 'Oven',
                'image' => 'http://192.168.168.51:8000/storage/Images/Kategori/p_headline_5-rekomendasi-oven-listrik-terbaik-berk-2fd867.jpg',
            ],
        ];

        foreach($data as $key=>$value){
            Kategori::create($value);
        }
    }
}
