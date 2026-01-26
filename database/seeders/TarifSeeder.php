<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TarifSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tarif')->insert([
            [
                'daya' => 1300,
                'tarifperkwh' => 1444,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
