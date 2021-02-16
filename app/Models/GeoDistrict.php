<?php

namespace App\Models;

use App\BaseModel;

class GeoDistrict extends BaseModel
{
    public $table = 'geo_districts';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name_eng',
        'name_bng',
        'status',
        'geo_division_id'
    ];
}
