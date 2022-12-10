<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Voucher;

class DiscountSeeder extends Seeder
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
                'name' => 'disount 80%',
                'diskon' => 0.80,
                'image' => 'image_80%.jpg',
                'keterangan' => 'ini discount 80% gaes',
            ],
            [
                'name' => 'disount 50%',
                'diskon' => 0.50,
                'image' => 'image_50.jpg',
                'keterangan' => 'ini discount 50% gaes',
            ],
            [
                'name' => 'disount Rp 20.000',
                'diskon' => 20000,
                'image' => 'image_20000.jpg',
                'keterangan' => 'ini discount 20.000 gaes',
            ],
        ];
        foreach($data as $key => $value){
            Voucher::create($value);
        }
    }
}
