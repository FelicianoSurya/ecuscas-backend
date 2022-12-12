<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembayaran;

class PembayaranSeeder extends Seeder
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
                'name' => 'gopay',
            ],
            [
                'name' => 'shopeepay',
            ],
            [
                'name' => 'ovo',
            ],
            [
                'name' => 'BCA',
            ],
        ];
        foreach($data as $key => $value){
            Pembayaran::create($value);
        }
    }
}
