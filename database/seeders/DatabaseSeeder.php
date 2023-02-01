<?php

namespace Database\Seeders;

use Illuminate\Cache\TagSet;
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
        $this->call([
            CategorySeeder::class,
            CategoryTranslationSeeder::class,
            MealSeeder::class,
            MealTranslationSeeder::class,
            TagSeeder::class,
            TagTranslationSeeder::class,
            IngredientSeeder::class,
            IngredientTranslationSeeder::class,
            IngredientMealSeeder::class,
            MealTagSeeder::class,

        ]);
    }
}
