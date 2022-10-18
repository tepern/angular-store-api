<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'date_from',
        'date_to',
        'price',
        'is_full_tank',
        'is_need_child_chair',
        'is_right_wheel',
        'city_id',
        'point_id',
        'rate_id',
        'order_status_id',
        'car_id'
    ];

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class,'order_status_id');
    }

    public function carModel()
    {
        return $this->belongsTo(CarModel::class,'car_id');
    }

    public function rate()
    {
        return $this->belongsTo(Rate::class,'rate_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

    public function point()
    {
        return $this->belongsTo(Point::class,'point_id');
    }
}
