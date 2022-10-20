<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rate
 *
 * @property int $id
 * @property int $price
 * @property int $rate_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\RateType $rateType
 * @method static \Illuminate\Database\Eloquent\Builder|Rate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rate newQuery()
 * @method static \Illuminate\Database\Query\Builder|Rate onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Rate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereRateTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Rate withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Rate withoutTrashed()
 * @mixin \Eloquent
 */
class Rate extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'price',
    ];

    public function rateType()
    {
        return $this->belongsTo(RateType::class,'rate_type_id');
    }
}
