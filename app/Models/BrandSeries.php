<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandSeries extends Model
{
    //
    protected $table = 'brand_series';

    protected $primaryKey = 'id';

    protected $guarded = [];

    // 所属系列
    public function series()
    {
        return $this->belongsTo(Series::class, 'series_id', 'id');
    }
}
