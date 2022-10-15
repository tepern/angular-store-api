<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'color' => $this->color,
            'dateFrom' => $this->date_from,
            'dateTo' => $this->date_to,
            'price' => $this->price,
            'isFullTank' => $this->is_full_tank,
            'cityId' => CityResource::make($this->city),
            'pointId' => PointResource::make($this->point),
            'carId' => CarModelResource::make($this->carModel),
            'rateId' => RateResource::make($this->rate),
            'orderStatusId' => OrderStatusResource::make($this->orderStatus),
            'isNeedChildChair' => $this->is_need_child_chair,
            'isRightWheel' => $this->is_right_wheel,
            'id' => $this->id,
        ];
    }
}
