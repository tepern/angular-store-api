<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

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
