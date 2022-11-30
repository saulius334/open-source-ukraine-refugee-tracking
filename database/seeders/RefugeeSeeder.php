<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefugeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('refugees')->insert([
            'name' => 'Kibiras',
            'surname' => 'BMW',
            'IdNumber' => '0955554321',
            'bedsTaken' => '5',
            'current_refugee_camp_id' => '1',
        ]);
    }
}
