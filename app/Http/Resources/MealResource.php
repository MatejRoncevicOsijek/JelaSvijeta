<?php

namespace App\Http\Resources;

use App\Models\Meal;
use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */


    public static function collection($resource)
    {
        return new MealResourceCollection($resource);
    }

    public function toArray($request)
    {
        $meals = Meal::query();
        $timeStamp = $request->get('diff_time');
        $date = date("Y-m-d H:i:s", $timeStamp);
        if ($timeStamp && $timeStamp > 0 && $this->trashed()) {
            $status = 'deleted';
        } elseif ($timeStamp && $timeStamp > 0 && $this->updated_at >= $date) {
            $status = 'modified';
        } else {
            $status = 'created';
        }


        if ($request->has('with')) {
            $with = explode(',', $request->get('with'));
            if (in_array('ingredients', $with)) {
                $meals->with('ingredients');
            }
            if (in_array('category', $with)) {
                $meals->with('categories');
            }
            if (in_array('tags', $with)) {
                $meals->with('tags');
            }
            $response = [
                'id'=> $this->id,
                'title'=> $this->translate($request->get('lang'))->title,
                'description'=> $this->translate($request->get('lang'))->description,
                'status'=> $status,
            ];

            if (in_array('category', $with)) {
                $response['category'] = new CategoryResource($this->categories);
            }
            if (in_array('tags', $with)) {
                $response['tags'] =TagResource::collection($this->tags);
            }
            if (in_array('ingredients', $with)) {
                $response['ingredients'] =IngredientResource::collection($this->ingredients);
            }
            $response['status'] = $status;
            return $response;
        } else {
            return [
                'id'=> $this->id,
                'title'=> $this->translate($request->get('lang'))->title,
                'description'=> $this->translate($request->get('lang'))->description,
                'status'=> $status,
            ];
        }
    }
}
