<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pelanggan')->insert([
            [
                'username' => 'pelanggan1',
                'password' => Hash::make('123456'),
                'nomor_kwh' => '1234567890',
                'nama_pelanggan' => 'Pelanggan Satu',
                'alamat' => 'Jl. Raya No. 1',
                'id_tarif' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
