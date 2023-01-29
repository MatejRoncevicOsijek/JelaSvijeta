<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MealResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public $paginatorMeta;
    public $paginatorLinks;
public function __construct($resource)
{
   
    $this->paginatorMeta =  [
        'currentPage' =>$resource->currentPage(),
        'totalItems' => $resource->total(),
        'itemsPerPage' => $resource->perPage(),
        'totalPages' => $resource->lastPage()
    ];
    $this->paginatorLinks =  [
        'prev' => $resource->previousPageUrl(),
        'next' => $resource->nextPageUrl(),
        'self' => $resource->url($resource->currentPage())
    ];

    $resource = $resource->getCollection();
    parent::__construct($resource);
}

    public function toArray($request)
    {
    return [
        'meta'=>$this->paginatorMeta,
        'data' => parent::toArray($request),
        'links'=>$this->paginatorLinks,
       
    ];
    

   
}
}
