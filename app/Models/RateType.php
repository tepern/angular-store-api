<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RateType
 *
 * @property int $id
 * @property string $name
 * @property string|null $unit
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Rate[] $rates
 * @property-read int|null $rates_count
 * @method static \Illuminate\Database\Eloquent\Builder|RateType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RateType newQuery()
 * @method static \Illuminate\Database\Query\Builder|RateType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RateType query()
 * @method static \Illuminate\Database\Eloquent\Builder|RateType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RateType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RateType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RateType whereUnit($value)
 * @method static \Illuminate\Database\Query\Builder|RateType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|RateType withoutTrashed()
 * @mixin \Eloquent
 */
class RateType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'unit',
    ];

    public $timestamps = false;

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
}
