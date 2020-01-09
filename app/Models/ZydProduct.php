<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZydProduct extends Model
{
    protected $table = 'glj_products';

    protected $primaryKey = 'id';

    protected $guarded = [];

    // public $timestamps = false;

    protected $casts = [
        'parameter_json' => 'array',
    ];
}
