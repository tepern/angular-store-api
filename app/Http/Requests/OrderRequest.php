<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'order_status_id'=> 'required',
            'city_id'        => 'required',
            'point_id'       => 'required',
            'car_id'         => 'required',
            'color'          => 'required|string|max:10',
            'date_from'      => 'required|max:15',
            'date_to'        => 'required|max:15',
            'rate_id'        => 'required',
            'price'          => 'required|max:10',
            'is_full_tank'   => 'required',
            'is_need_child_chair' => 'required',
            'is_right_wheel' => 'required'
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'order_status_id' => (int)$this->orderStatusId['id'],
            'city_id'         => (int)$this->cityId['id'],
            'point_id'        => (int)$this->pointId['id'],
            'car_id'          => (int)$this->carId['id'],
            'color'           => $this->color,
            'date_from'       => $this->dateFrom,
            'date_to'         => $this->dateTo,
            'rate_id'         => (int)$this->rateId['id'],
            'price'           => $this->price,
            'is_full_tank'    => $this->isFullTank,
            'is_need_child_chair' => $this->isNeedChildChair,
            'is_right_wheel'  => $this->isRightWheel
        ]);
    }
}
