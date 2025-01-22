<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "parent_id" => $this->parent_id,
            "image_path" => $this->image_path,
            "slug" => $this->slug,
            "sort" => $this->sort,
            "products" => $this->products
        ];
    }
}
