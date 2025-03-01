<?php

namespace App\Http\Resources;

//use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
class CategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    
    public function toArray($request): array
    {
        $count = $this->collection->count();
        return [
            'count' => $count,
            'data' => $this->collection->toArray(),
        ];
    }
}
