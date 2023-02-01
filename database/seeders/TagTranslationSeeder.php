<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\TagTranslation;

class TagTranslationSeeder extends Seeder
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

        $id_tag=Tag::pluck('id');

        for ($i = 0; $i < 10; $i++) {
            $j++;

            $tag = new TagTranslation();
            $tag->tag_id = $id_tag[$i];
            $tag->title=$faker->word().' '.  $j. ' ENG TAG TITLE';
            $tag->locale='en';
            $tag->save();

            $taghr = new TagTranslation();
            $taghr->tag_id = $id_tag[$i];
            $taghr->title=$faker->word().' '.  $j. ' HR TAG NASLOV';
            $taghr->locale='hr';
            $taghr->save();

            $tagfr = new TagTranslation();
            $tagfr->tag_id=$id_tag[$i];
            $tagfr->title=$faker->word().' '.  $j. ' FR TAG le NASLOV';
            $tagfr->locale='fr';
            $tagfr->save();
        }
    }
}
