<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();

        Categories::factory(5)->create();

        Posts::factory(20)->create();
    }
}
