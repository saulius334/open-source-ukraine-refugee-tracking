<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\RefugeeCamp\RefugeeCampCountService\RefugeeCampCountService;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'saulius',
            'email' => 'saulius@gmail.com',
            'password' => Hash::make('123'),
            'role' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'paulius',
            'email' => 'paulius@gmail.com',
            'password' => Hash::make('123'),
            'role' => 1
        ]);
        $this->call([
            RefugeeCampSeeder::class,
            RefugeeSeeder::class,
        ]);

        $countService = new RefugeeCampCountService();
        $countService->updateAll();
    }
}
