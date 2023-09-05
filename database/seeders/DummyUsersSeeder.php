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
                'kelas' => '',
                'password' => bcrypt('123456'),
                'id_cabang' => 1
            ],
            [
                'name' => 'Petugas Stand',
                'username' => 'petugas',
                'role' => 'petugas',
                'kelas' => '',
                'email' => 'petugas@gmail.com',
                'password' => bcrypt('123456'),
                'id_cabang' => 1,
            ],
            [
                'name' => 'Petugas Stand X PPLG 2',
                'username' => 'xpplg2',
                'role' => 'petugas',
                'kelas' => '',
                'email' => 'xpplg2@gmail.com',
                'password' => bcrypt('123456'),
                'id_cabang' => 1,
            ],
            [
                'name' => 'Petugas Stand X PPLG 1',
                'username' => 'xpplg1',
                'role' => 'petugas',
                'kelas' => '',
                'email' => 'xpplg1@gmail.com',
                'password' => bcrypt('123456'),
                'id_cabang' => 1,
            ],
        ];

        foreach ($userData as $key => $value) {
            User::create($value);
        }
    }
}
