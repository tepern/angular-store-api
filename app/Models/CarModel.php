<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

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
