<?php

namespace App\Models;

use App\BaseModel;

class JobApplication extends BaseModel
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'contact_no',
        'resume',
        'job_id'
    ];

    public static $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'address' => 'required',
        'contact_no' => 'required',
        'resume' => 'required',
        'job_id' => 'required'
    ];
    
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
