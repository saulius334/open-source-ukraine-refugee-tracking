<?php

namespace Database\Seeders;

use App\Repositories\Interfaces\RefugeeCampRepositoryInterface;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function __construct(private RefugeeCampRepositoryInterface $campRepo)
    {
    }
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
        $camps = $this->campRepo->getAll();
        $camps->each(function ($camp) {
            $refugeeCapacity = 0;
            foreach ($camp->getRefugees()->get() as $refugee) {
                if ($refugee->confirmed) {
                    $refugeeCapacity += $refugee->bedsTaken;
                }
            }
            $actual = $camp->originalCapacity - $refugeeCapacity;
            $this->campRepo->update(['currentCapacity' => $actual], $camp);
        });
    }
}
