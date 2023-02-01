<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\CategoryTranslation;

class CategoryTranslationSeeder extends Seeder
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

        $id_category=Category::pluck('id');

        for ($i = 0; $i < 10; $i++) {
            $j++;

            $category= new CategoryTranslation();
            $category->category_id = $id_category[$i];
            $category->title=$faker->word().' '. $j. ' ENG CATEGORY TITLE';
            $category->locale='en';
            $category->save();

            $categoryhr = new CategoryTranslation();
            $categoryhr->category_id = $id_category[$i];
            $categoryhr->title=$faker->word().' '.  $j. ' HR CATEGORY NASLOV';
            $categoryhr->locale='hr';
            $categoryhr->save();

            $categoryfr = new CategoryTranslation();
            $categoryfr->category_id=$id_category[$i];
            $categoryfr->title=$faker->word().' '.  $j. ' FR CATEGORY le NASLOV';
            $categoryfr->locale='fr';
            $categoryfr->save();
        }
    }
}
