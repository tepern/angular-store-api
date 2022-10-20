<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $order_status_id
 * @property int $city_id
 * @property int $point_id
 * @property int $car_id
 * @property int $rate_id
 * @property string $color
 * @property int $date_from
 * @property int $date_to
 * @property string $price
 * @property int $is_full_tank
 * @property int $is_need_child_chair
 * @property int $is_right_wheel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CarModel $carModel
 * @property-read \App\Models\City $city
 * @property-read \App\Models\OrderStatus $orderStatus
 * @property-read \App\Models\Point $point
 * @property-read \App\Models\Rate $rate
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDateFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDateTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIsFullTank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIsNeedChildChair($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIsRightWheel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePointId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereRateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
