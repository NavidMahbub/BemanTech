<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\ContentCategory;

class ContentCategoryRequest extends FormRequest
{
    public function rules()
    {
        $rules = ContentCategory::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
