<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('level')->insert([
            ['nama_level' => 'admin'],
            ['nama_level' => 'petugas'],
            // ['nama_level' => 'pelanggan'],
        ]);
    }
}
