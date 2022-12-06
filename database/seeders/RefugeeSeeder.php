<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RefugeeSeeder extends Seeder
{
    public function run(): void
    {
        $refugeeCount = 30;
        $faker = Faker::create();

        foreach (range(0,$refugeeCount) as $_) {
            DB::table('refugees')->insert([
                'name' => $faker->firstName(),
                'surname' => $faker->lastName(),
                'IdNumber' => $faker->numberBetween(10,10),
                'bedsTaken' => $faker->numberBetween(1,5),
                'current_refugee_camp_id' => $faker->numberBetween(1,2),
                'confirmed' => $faker->boolean(50),
            ]);
        }
        // DB::table('refugees')->insert([
        //     'name' => 'Kibiras',
        //     'surname' => 'BMW',
        //     'IdNumber' => '0955554321',
        //     'bedsTaken' => '5',
        //     'current_refugee_camp_id' => '1',
        //     'confirmed' => true
        // ]);
        // DB::table('refugees')->insert([
        //     'name' => 'Kibiras',
        //     'surname' => 'BMW',
        //     'IdNumber' => '0955554321',
        //     'bedsTaken' => '5',
        //     'current_refugee_camp_id' => '1',
        //     'confirmed' => true
        // ]);
    }
}
