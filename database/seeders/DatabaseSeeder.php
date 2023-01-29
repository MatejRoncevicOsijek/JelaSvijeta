<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
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
