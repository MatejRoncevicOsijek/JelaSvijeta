<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\MealTag;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id_meals = Meal::withTrashed()->pluck('id');
        foreach ($id_meals as $id_meal) {
            $id_tags = Tag::pluck('id')->unique()->random(3)->all();
            foreach ($id_tags as $id_tag) {
                MealTag::create([
                'tag_id' => $id_tag,
                'meal_id' => $id_meal,
                ]);
            }
        }
    }
}
