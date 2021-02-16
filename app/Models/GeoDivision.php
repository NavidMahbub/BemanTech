<?php

namespace App\Models;

use App\BaseModel;

class GeoDivision extends BaseModel
{
    public $table = 'geo_divisions';
    
    protected $dates = ['deleted_at'];
    
    public $fillable = [
        'name_eng',
        'name_bng',
        'status'
    ];
}
