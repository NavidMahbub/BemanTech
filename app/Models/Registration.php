<?php

namespace App\Models;

use App\BaseModel;
use App\User;

class Registration extends BaseModel
{
    protected $fillable = [
        'code',
        'reg_code',
        'name',
        'data',
        'payment_type',
        'account_no',
        'amount',
        'payment',
        'approved',
        'geo_division_id',
        'geo_district_id',
        'geo_upazila_id',
        'geo_union_id',
        'temp_password',
        'image',
        'type',
        'notified',
        'created_by',
        'updated_by',
        'deleted_by',
        'field_admin',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function division()
    {
        return $this->belongsTo(GeoDivision::class, 'geo_division_id');
    }
    
    public function district()
    {
        return $this->belongsTo(GeoDistrict::class, 'geo_district_id');
    }
    
    public function upazila()
    {
        return $this->belongsTo(GeoUpazila::class, 'geo_upazila_id');
    }
    
    public function union()
    {
        return $this->belongsTo(GeoUnion::class, 'geo_union_id');
    }
}
