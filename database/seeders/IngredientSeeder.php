<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run(){
        $faker = Faker::create();
        $j=0;

    for ($i = 0; $i < 10; $i++) {
        $j++;
        $Ingredient = new Ingredient();
        $Ingredient->slug=$faker->unique()->word().' '. $j;
        $Ingredient->save();
    }
}
}
