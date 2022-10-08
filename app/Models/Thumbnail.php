<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany(CarModel::class,'thumbnail_id');
    }
}
