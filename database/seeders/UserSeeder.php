<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
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
                'name' => 'admin',
                'username' => 'admin111',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin123'),
                'phone' => '+62803930303',
                'address' => 'Sukabumi Indonesia',
                'role' => 'admin',
            ],
            [
                'name' => 'Feliciano Surya Marcello',
                'username' => 'feliciano123',
                'email' => 'feliciano@user.com',
                'password' => bcrypt('feliciano123'),
                'phone' => '+62803930222',
                'address' => 'Vanya Park BSD',
                'role' => 'user',
            ],
            [
                'name' => 'Nehemia Gueldi',
                'username' => 'nehemia123',
                'email' => 'nehemia@user.com',
                'password' => bcrypt('nehemia123'),
                'phone' => '+6280393033',
                'address' => 'Newton Ruko Gading Serpong',
                'role' => 'user',
            ],
            [
                'name' => 'Kezia Ivena',
                'username' => 'kezia123',
                'email' => 'kezia@user.com',
                'password' => bcrypt('kezia123'),
                'phone' => '+62803930222',
                'address' => 'Newton Ruko wanita Gading Serpong',
                'role' => 'user',
            ],
            [
                'name' => 'Dea Noveriyanti',
                'username' => 'dea123',
                'email' => 'dea@user.com',
                'password' => bcrypt('dea123'),
                'phone' => '+62803930222',
                'address' => 'Nusaloka BSD',
                'role' => 'user',
            ],
        ];
        foreach($data as $key => $value){
            User::create($value);
        }
    }
}
