<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\BlogCategory;

class BlogCategoryRequest extends FormRequest
{
    public function rules()
    {
        $rules = BlogCategory::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
