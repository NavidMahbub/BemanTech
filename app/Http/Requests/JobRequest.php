<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\Job;

class JobRequest extends FormRequest
{
    public function rules()
    {
        $rules = Job::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
