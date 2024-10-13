<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::whereHas('roles', function($q) {
            $q->where('name', 'SiswaOrangTua');
        })->pluck('id');

        DB::table('users')->whereIn('id', $user)->update(['email_verified_at' => now()]);
        $faker = Faker::create('id_ID');
        $agama = ['Islam', 'Kristen', 'Katholik', 'Hindu', 'Budha'];
        $jk = ['Laki-laki', 'Perempuan'];
        $angkatan = [2021, 2022, 2023, 2024];
        $kelas = ['10A', '10B', '11A', '11B', '12A', '12B'];

        for ($i = 0; $i < count($user); $i++) { // Generate Sesuai jumlah user
            DB::table('siswas')->insert([
                'nama' => $faker->name,
                'user_id' => $user[$i],
                'tanggal_lahir' => $faker->date(),
                'nama_wali' => $faker->name,
                'alamat' => $faker->address,
                'no_telp' => $faker->phoneNumber,
                'email' => $faker->email,
                'angkatan' => $angkatan[array_rand($angkatan)],
                'kelas' => $kelas[array_rand($kelas)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
