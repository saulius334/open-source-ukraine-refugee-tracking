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
        $pets = [null, 'Cat', 'Dog', 'Bebr', 'kot', null];
        $destinations = [null, 'Lituania', 'Kyiv', 'Kharkiv', 'Odesa', 'Dnipro', 'Donetsk', 'Poland', null];
        $yesno = [null, 'Yes', 'No'];
        $feeling = [null, 'Bad', 'Normal', 'Good'];
        foreach (range(0, $refugeeCount) as $_) {
            DB::table('refugees')->insert([
                'name' => $faker->firstName(),
                'surname' => $faker->lastName(),
                'IdNumber' => $faker->numerify('##########'),
                'bedsTaken' => $faker->numberBetween(1, 5),
                'current_refugee_camp_id' => $faker->numberBetween(1, 2),
                'confirmed' => $faker->boolean(50),
                'pets' => $pets[rand(0, 5)],
                'aidReceived' => $yesno[rand(0, 2)],
                'healthCondition' => $feeling[rand(0, 3)],
                'destination' => $destinations[rand(0, 8)],
                'created_at' => $faker->dateTimeBetween('-2 months'),
                'updated_at' => $faker->dateTimeThisMonth(),
            ]);
        }
    }
}
