<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\Slider;

class SliderRequest extends FormRequest
{
    public function rules()
    {
        $rules = Slider::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
