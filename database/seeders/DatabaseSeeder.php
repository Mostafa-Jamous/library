<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
       $this->call([CategorySeeder::class , BookSeeder::class, AuthorSeeder::class]);
=======
       $this->call([CategorySeeder::class , BookSeeder::class , AuthorSeeder::class]);
>>>>>>> 0253129807e34e3c66c1a72cfbc2149b85dadab7
    }
}
