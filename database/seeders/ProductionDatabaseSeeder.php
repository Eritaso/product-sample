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
        ProfileEloquent::factory(['id' => 1, 'name' => '笹田 さゆり', 'sexType' => 1, 'tel' => '060-779-9877'])->has(HolidayEloquent::factory()->count(1), 'holidays')->create();
        ProfileEloquent::factory(['id' => 2, 'name' => '西之園 智也', 'sexType' => 0, 'tel' => '0241-78-5179'])->has(HolidayEloquent::factory()->count(2), 'holidays')->create();
        ProfileEloquent::factory(['id' => 3, 'name' => '中津川 あすか', 'sexType' => 1, 'tel' => '080-3942-8932'])->has(HolidayEloquent::factory()->count(3), 'holidays')->create();
        ProfileEloquent::factory(['id' => 4, 'name' => '田中 亮介', 'sexType' => 0, 'tel' => '02-3648-4358'])->has(HolidayEloquent::factory()->count(1), 'holidays')->create();
        ProfileEloquent::factory(['id' => 5, 'name' => '伊藤 幹', 'sexType' => 1, 'tel' => '080-8014-5790'])->has(HolidayEloquent::factory()->count(2), 'holidays')->create();
        ProfileEloquent::factory(['id' => 6, 'name' => '田辺 和也', 'sexType' => 0, 'tel' => '05-9441-0817'])->has(HolidayEloquent::factory()->count(3), 'holidays')->create();
        ProfileEloquent::factory(['id' => 7, 'name' => '田中 真綾', 'sexType' => 1, 'tel' => '023-965-4577'])->has(HolidayEloquent::factory()->count(1), 'holidays')->create();
        ProfileEloquent::factory(['id' => 8, 'name' => '青田 里佳', 'sexType' => 1, 'tel' => '0530-808-550'])->has(HolidayEloquent::factory()->count(2), 'holidays')->create();
        ProfileEloquent::factory(['id' => 9, 'name' => '田辺 加奈', 'sexType' => 1, 'tel' => '0050-588-303'])->has(HolidayEloquent::factory()->count(3), 'holidays')->create();
        ProfileEloquent::factory(['id' => 10, 'name' => '廣川 太一', 'sexType' => 0, 'tel' => '047-039-3942'])->has(HolidayEloquent::factory()->count(1), 'holidays')->create();
        ProfileEloquent::factory(['id' => 11, 'name' => '田村 和彦', 'sexType' => 0, 'tel' => '070-9433-9488'])->has(HolidayEloquent::factory()->count(2), 'holidays')->create();
    }
}
