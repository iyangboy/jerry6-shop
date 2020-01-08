<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChinaArea extends Model
{
    protected $table = 'china_area';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function name($code)
    {
        return $this->where('code', $code)->get('name');
    }

    public function code($name)
    {
        return $this->where('name', $name)->get('code');
    }
}
