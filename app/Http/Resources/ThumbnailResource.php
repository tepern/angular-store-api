<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ThumbnailResource extends JsonResource
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
            'size' => $this->size,
            'path' => $this->path,
            'originalname' => $this->originalname,
            'mimetype' => $this->mimetype,
        ];
    }
}
