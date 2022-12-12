<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ongkir;

class OngkirSeeder extends Seeder
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
                'name' => 'Sicepat',
                'harga' => 8000, 
            ],
            [
                'name' => 'Sicepat Express',
                'harga' => 25000, 
            ],
            [
                'name' => 'J&T Express',
                'harga' => 20000, 
            ],
            [
                'name' => 'J&E Express',
                'harga' => 22000, 
            ],
        ];
        foreach($data as $key => $value){
            Ongkir::create($value);
        }
    }
}
