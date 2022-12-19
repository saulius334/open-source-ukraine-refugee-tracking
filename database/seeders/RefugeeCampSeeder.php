<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefugeeCampSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('refugee_camps')->insert([
            'name' => 'Sauliaus Camp',
            'originalCapacity' => 1000,
            'currentCapacity' => 995,
            'coords_lat' => 50.434341,
            'coords_lng' => 30.527756,
            'user_id' => '1',
        ]);
        DB::table('refugee_camps')->insert([
            'name' => 'Pauliaus Camp',
            'originalCapacity' => 200,
            'currentCapacity' => 199,
            'coords_lat' => 46.482952,
            'coords_lng' => 30.712481,
            'user_id' => '2',
        ]);
    }
}
