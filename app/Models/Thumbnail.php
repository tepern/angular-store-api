<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Thumbnail
 *
 * @property int $id
 * @property int|null $size
 * @property string|null $path
 * @property string $originalname
 * @property string|null $mimetype
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CarModel[] $carModels
 * @property-read int|null $car_models_count
 * @method static \Illuminate\Database\Eloquent\Builder|Thumbnail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Thumbnail newQuery()
 * @method static \Illuminate\Database\Query\Builder|Thumbnail onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Thumbnail query()
 * @method static \Illuminate\Database\Eloquent\Builder|Thumbnail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thumbnail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thumbnail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thumbnail whereMimetype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thumbnail whereOriginalname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thumbnail wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thumbnail whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thumbnail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Thumbnail withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Thumbnail withoutTrashed()
 * @mixin \Eloquent
 */
class Thumbnail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'originalname',
        'size',
        'path',
        'mimetype',
    ];

    public function carModels()
    {
        return $this->hasMany(CarModel::class);
    }
}
