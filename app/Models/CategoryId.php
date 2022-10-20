<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CategoryId
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CarModel[] $carModels
 * @property-read int|null $car_models_count
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryId newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryId newQuery()
 * @method static \Illuminate\Database\Query\Builder|CategoryId onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryId query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryId whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryId whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryId whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryId whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryId whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryId whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|CategoryId withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CategoryId withoutTrashed()
 * @mixin \Eloquent
 */
class CategoryId extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    public function carModels()
    {
        return $this->hasMany(CarModel::class,'category_id');
    }
}
