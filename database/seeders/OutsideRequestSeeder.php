<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutsideRequestSeeder extends Seeder
{
    public function run()
    {
        DB::table('outside_requests')->insert([
            'name' => 'Paulius',
            'surname' => 'Kastytis',
            'IdNumber' => '0987654321',
            'bedsTaken' => '2',
            'current_refugee_camp_id' => '1',
        ]);
    }
}
