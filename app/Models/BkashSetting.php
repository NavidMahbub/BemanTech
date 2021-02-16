<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BkashSetting extends Model
{
    protected $fillable = [
        'app_id', 'app_secret', 'username', 'password', 'access_token', 'refresh_token', 'duration'
    ];
}
