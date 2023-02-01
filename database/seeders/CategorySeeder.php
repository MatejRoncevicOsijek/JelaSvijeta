<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();
        $j=0;

        for ($i = 0; $i < 10; $i++) {
            $j++;
            $category = new Category();
            $category->slug=$faker->unique()->word().' '. $j;
            $category->save();
        }
    }
}
