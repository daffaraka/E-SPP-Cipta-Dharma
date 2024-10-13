<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin =  User::create(
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
            ]
        );

        $admin->assignRole('admin');

        $kepsek = User::create(
            [
                'name' => 'Kepsek',
                'email' => 'kepsek@gmail.com',
                'password' => bcrypt('password')
            ]
        );

        $kepsek->assignRole('KepalaSekolah');


        for ($i = 0; $i < 10; $i++) {
            $user = User::create(
                [
                    'name' => 'User ' . $i,
                    'email' => 'user' . $i . '@gmail.com',
                    'password' => bcrypt('password'),
                ]
            );

            $user->assignRole('SiswaOrangTua');
        }
    }
}
