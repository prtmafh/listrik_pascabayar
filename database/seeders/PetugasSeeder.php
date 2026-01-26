<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'petugas1',
                'password' => Hash::make('123456'),
                'nama_admin' => 'Petugas Satu',
                'id_level' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
