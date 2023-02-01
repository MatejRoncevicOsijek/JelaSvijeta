<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


use App\Models\MealTranslation;

class MealTranslationSeeder extends Seeder
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

        $id_meal=Meal::withTrashed()->pluck('id');

        for ($i = 0; $i < 10; $i++) {
            $j++;

            $meal = new MealTranslation();
            $meal->meal_id = $id_meal[$i];

            $meal->title=$faker->word().' '.  $j. ' ENG NASLOV';
            $meal->description=$faker->sentence().' '. $j. ' ENG DESC';
            $meal->locale='en';
            $meal->save();

            $mealhr = new MealTranslation();
            $mealhr->meal_id = $id_meal[$i];
            $mealhr->title=$faker->word().' '.  $j. ' HR NASLOV';
            $mealhr->description=$faker->sentence().' '.  $j. ' HR DESC';
            $mealhr->locale='hr';
            $mealhr->save();

            $mealfr = new MealTranslation();
            $mealfr->meal_id = $id_meal[$i];
            $mealfr->title=$faker->word().' '.  $j. '  FR NASLOV';
            $mealfr->description=$faker->sentence().' '.  $j. ' FR DESC';
            $mealfr->locale='fr';
            $mealfr->save();
        }
    }
}
