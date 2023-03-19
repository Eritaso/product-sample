<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\HolidayEloquent;
use App\Models\ProfileEloquent;
use App\Models\UserEloquent;
use Illuminate\Database\Seeder;

class ProductionDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        UserEloquent::factory(['id' => 1, 'name' => '古賀 直子'])->create();
        ProfileEloquent::factory(['name' => '笹田 さゆり', 'sexType' => 1, 'tel' => '060-779-9877'])->has(HolidayEloquent::factory()->count(1), 'holidays')->create();
    }
}
