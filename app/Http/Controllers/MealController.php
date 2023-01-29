<?php

namespace App\Http\Controllers;

use App\Http\Resources\MealResource;
use App\Http\Resources\MealResourceCollection;
use App\Models\Meal;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MealController extends Controller
{
    public function filter(Request $request){
       

        $validator = Validator::make(
            $request->all(), [
            'lang'  => 'required|max:2|in:en,hr,fr',
             ]);

             if ($validator->fails()) {
                return response()->json($validator->errors());
            }
        
        $meals = Meal::query();
        

        // check if category is present in the url
        if($request->has('category')){
            $categoryId = $request->get('category');
            // check if category is null or not
             if($categoryId != 'NULL'){
                $meals->where('category_id',$categoryId);
             }
            else{
                $meals->whereNull('category_id');
            }
        }

        // check if tag is present in the url
        if($request->has('tags')){
            $tagId = $request->get('tags');
            $meals->whereHas('tags', function($query) use ($tagId){
                    $query->whereIn('tag_id', explode(',', $tagId));
                });    
            }


        $perPage = (int)$request->get('per_page');

        $with = $request->get('with');
        if($with){
            $with = explode(',', $with);
            if(in_array('ingredients', $with)){
                $meals->with('ingredients');
            }
            if(in_array('category', $with)){
                $meals->with('categories');
            }
            if(in_array('tags', $with)){
                $meals->with('tags');
            }
        }
        
        $diffTime = $request->get('diff_time');

        if($request->has('diff_time') && is_numeric($diffTime) && $diffTime > 0) {
                $meals->withTrashed();
         }
            return new MealResourceCollection($meals->paginate($perPage));
        }
        

       
        
     

        
       

}

