<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\SettingSite;

class SettingSiteRequest extends FormRequest
{
    public function rules()
    {
        $rules = SettingSite::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
