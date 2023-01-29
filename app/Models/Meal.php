<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\SoftDeletes;


use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Meal extends Model implements TranslatableContract
{
    use HasFactory;
    use SoftDeletes;

    use Translatable;
    
    public $translatedAttributes = ['title', 'description'];


    public function tags()
    {
        return $this->belongsToMany(Tag::class, "meal_tags", "meal_id", "tag_id");
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, "ingredient_meals", "meal_id", "ingredient_id");
    }

    public function categories()
    {
        return $this->hasOne(Category::class, "id", "category_id");
    }

    
}
