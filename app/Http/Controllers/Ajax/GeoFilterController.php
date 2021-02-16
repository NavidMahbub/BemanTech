<?php

namespace App\Http\Controllers\Ajax;

use App\Models\GeoUnion;
use App\Models\GeoUpazila;
use App\Models\GeoDivision;
use App\Models\GeoDistrict;
use App\Http\Controllers\Controller;

class GeoFilterController extends Controller
{
    public function division(GeoDivision $model)
    {
        $model = $model->newQuery();
        
        return $model->get();
    }
    
    public function district(GeoDistrict $model)
    {
        $model = $model->newQuery();
    
        if (\request()->has('division')) {
            $model->where('geo_division_id', \request()->get('division'));
        }
    
        return $model->get();
    }
    
    public function upazila(GeoUpazila $model)
    {
        $model = $model->newQuery();
        
        if (\request()->has('division')) {
            $model->where('geo_division_id', \request()->get('division'));
        }
    
        if (\request()->has('district')) {
            $model->where('geo_district_id', \request()->get('district'));
        }
        
        return $model->get();
    }
    
    public function union(GeoUnion $model)
    {
        $model = $model->newQuery();
        
        if (\request()->has('division')) {
            $model->where('geo_division_id', \request()->get('division'));
        }
        
        if (\request()->has('district')) {
            $model->where('geo_district_id', \request()->get('district'));
        }
    
        if (\request()->has('upazila')) {
            $model->where('geo_upazila_id', \request()->get('upazila'));
        }
        
        return $model->get();
    }
}
