<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CarModel
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $priceMin
 * @property int $priceMax
 * @property string $number
 * @property int $category_id
 * @property int $thumbnail_id
 * @property int $tank
 * @property array $colors
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\CategoryId $categoryId
 * @property-read \App\Models\Thumbnail $thumbnail
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel newQuery()
 * @method static \Illuminate\Database\Query\Builder|CarModel onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereColors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel wherePriceMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel wherePriceMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereTank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereThumbnailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|CarModel withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CarModel withoutTrashed()
 * @mixin \Eloquent
 */
class CarModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'colors' =>'json',
    ];

    protected $fillable = [
        'name',
        'description',
        'priceMin',
        'priceMax',
        'number',
        'tank',
        'colors'
    ];


    public function categoryId()
    {
        return $this->belongsTo(CategoryId::class,'category_id');
    }

    public function thumbnail()
    {
        return $this->belongsTo(Thumbnail::class);
    }
}
