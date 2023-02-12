<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ProfileEloquent;
use App\Models\UserEloquent;
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
        UserEloquent::factory(5)->create();
        ProfileEloquent::factory(20)->create();
    }
}
