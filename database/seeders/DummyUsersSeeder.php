<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Zaky Rama',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('123456'),
                'id_cabang' => 1
            ],
            [
                'name' => 'Petugas Stand',
                'username' => 'petugas',
                'role' => 'petugas',
                'email' => 'petugas@gmail.com',
                'password' => bcrypt('123456'),
                'id_cabang' => 1,
            ],
        ];

        foreach ($userData as $key => $value) {
            User::create($value);
        }
    }
}
