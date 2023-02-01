<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id_category=Category::pluck('id');
        for ($i = 0; $i < 10; $i++) {
            $meal = new Meal();
            $meal->category_id =rand(0, 1) ? null : $id_category[$i];
            $meal->deleted_at=rand(0, 1) ? null : now();
            $meal->save();
        }
    }
}
