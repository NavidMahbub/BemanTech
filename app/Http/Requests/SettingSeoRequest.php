<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\SettingSeo;

class SettingSeoRequest extends FormRequest
{
    public function rules()
    {
        $rules = SettingSeo::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
