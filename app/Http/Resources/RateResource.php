<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class RateResource extends JsonResource
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
            'id'        => $this->id,
            'price'     => $this->price,
            'rateTypeId' => RateTypeResource::make($this->rateType),
        ];
    }
}
