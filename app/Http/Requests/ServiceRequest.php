<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\Service;

class ServiceRequest extends FormRequest
{
    public function rules()
    {
        $rules = Service::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
