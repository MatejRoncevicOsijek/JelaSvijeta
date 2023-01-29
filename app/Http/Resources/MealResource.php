<?php

namespace App\Http\Resources;

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
     
    public function toArray($request){

    $timeStamp = $request->get('diff_time');
    $date = date("Y-m-d H:i:s", $timeStamp);
    if ($timeStamp && $timeStamp > 0 && $this->trashed()) {
        $status = 'deleted';
    } elseif ($timeStamp && $timeStamp > 0 && $this->updated_at >= $date) {
        $status = 'modified';
    } else {
        $status = 'created';
    }

    
    {
        return [
            'id'=> $this->id,
            'title'       => $this->translate($request->get('lang'))->title,
            'description'       => $this->translate($request->get('lang'))->description,
            'status'      => $status,
            'category_id'=>new CategoryResource($this->categories),
            'tags' =>TagResource::collection($this->tags),
            'ingredients'=>IngredientResource::collection($this->ingredients),
            
            
        ];
    }
}

}