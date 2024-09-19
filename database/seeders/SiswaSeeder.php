<?php

namespace Database\Seeders;

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
        $faker = Faker::create('id_ID');
        $agama = ['Islam', 'Kristen', 'Katholik', 'Hindu', 'Budha'];
        $jk = ['Laki-laki', 'Perempuan'];
        $angkatan = [2021, 2022, 2023, 2024];
        $kelas = ['10A', '10B', '11A', '11B', '12A', '12B'];

        for ($i = 0; $i < 50; $i++) { // Generate 50 siswa
            DB::table('siswas')->insert([
                'nama' => $faker->name,
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
