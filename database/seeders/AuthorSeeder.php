<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
<<<<<<< HEAD
    public function run(): void
    {
        Author::create(['name' => 'أحمد خالد توفيق']);
        Author::create(['name' => 'نجيب محفوظ']);
        Author::create(['name' => 'طه حسين']);
        Author::create(['name' => 'محمد حسنين هيكل']);
        Author::create(['name' => 'إحسان عبد القدوس']);
=======
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::factory(10)->create();
>>>>>>> 0253129807e34e3c66c1a72cfbc2149b85dadab7
    }
}
