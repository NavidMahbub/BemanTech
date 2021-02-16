<?php

namespace App\Models;

use App\BaseModel;

class GeoUnion extends BaseModel
{
    public $table = 'geo_unions';
    
    protected $dates = ['deleted_at'];
    
    public $fillable = [
        'name_eng',
        'name_bng',
        'status',
        'geo_division_id',
        'geo_district_id'
    ];
}
