<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin1',
                'password' => Hash::make('123456'),
                'nama_admin' => 'Administrator',
                'id_level' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
