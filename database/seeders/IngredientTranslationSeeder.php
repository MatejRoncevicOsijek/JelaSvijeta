<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\IngredientTranslation;

class IngredientTranslationSeeder extends Seeder
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

        $id_ingredient=Ingredient::pluck('id');

        for ($i = 0; $i < 10; $i++) {
            $j++;

            $ingredient = new IngredientTranslation();
            $ingredient->ingredient_id = $id_ingredient[$i];
            $ingredient->title=$faker->word().' '. $j. ' ENG INGREDIENT TITLE';
            $ingredient->locale='en';
            $ingredient->save();

            $ingredienthr = new IngredientTranslation();
            $ingredienthr->ingredient_id = $id_ingredient[$i];
            $ingredienthr->title=$faker->word().' '.  $j. ' HR INGREDIENT TITLE';
            $ingredienthr->locale='hr';
            $ingredienthr->save();

            $ingredientfr = new IngredientTranslation();
            $ingredientfr->ingredient_id = $id_ingredient[$i];
            $ingredientfr->title=$faker->word().' '.  $j. ' FR INGREDIENT Le TITLE';
            $ingredientfr->locale='fr';
            $ingredientfr->save();
        }
    }
}
