<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use  App\Http\Resources\ThumbnailResource;

class CarModelResource extends JsonResource
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
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'description' => $this->description,
            'priceMin' => $this->priceMin,
            'priceMax' => $this->priceMax,
            'name' => $this->name,
            'number' => $this->number,
            'categoryId' => CategoryIdResource::make($this->categoryId),
            'thumbnail' => ThumbnailResource::make($this->thumbnail),
            'tank' => $this->tank,
            'colors' => $this->colors,
            'id' => $this->id,
        ];
    }
}
