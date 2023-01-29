<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\IngredientMeal;
use App\Models\Meal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientMealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  
        $id_meals = Meal::pluck('id');
        foreach ($id_meals as $id_meal) {
            $id_ingredients= Ingredient::pluck('id')->unique()->random(3)->all();
            foreach ($id_ingredients as $id_ingredient) {
                IngredientMeal::create([
                'ingredient_id' => $id_ingredient,
                'meal_id' => $id_meal,
                ]);
         }
        }
    }
}
