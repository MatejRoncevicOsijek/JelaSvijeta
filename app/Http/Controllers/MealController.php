<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomApiRequest;
use App\Http\Resources\MealResourceCollection;
use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function filter(CustomApiRequest $request)
    {
        $meals = Meal::query();

        // check if category is present in the url
        if ($request->has('category')) {
            $categoryId = $request->get('category');
            // check if category is null or not
            if ($categoryId === '!NULL') {
                $meals->whereNotNull('category_id');
            } elseif ($categoryId != 'NULL') {
                $meals->where('category_id', $categoryId);
            } else {
                $meals->whereNull('category_id');
            }
        }

        // check if tag is present in the url
        if ($request->has('tags')) {
            $tagIds = explode(',', $request->get('tags'));
            $meals->whereHas('tags', function ($query) use ($tagIds) {
                $query->whereIn('tags.id', $tagIds);
                $query->groupBy('meal_id');
                $query->havingRaw('COUNT(meal_id) = '.count($tagIds));
            });
        }

        $perPage = (int)$request->get('per_page');

        $diffTime = $request->get('diff_time');

        if ($request->has('diff_time') && is_numeric($diffTime) && $diffTime > 0) {
            $meals->withTrashed();
        }
        return new MealResourceCollection($meals->paginate($perPage));
    }
}
