<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefugeeCampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('refugee_camps')->insert([
            'name' => 'Sauliaus Camp',
            'originalCapacity' => 1000,
            'currentCapacity' => 995,
            'user_id' => '1',
        ]);
    }
}
