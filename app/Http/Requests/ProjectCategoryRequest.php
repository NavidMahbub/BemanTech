<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\ProjectCategory;

class ProjectCategoryRequest extends FormRequest
{
    public function rules()
    {
        $rules = ProjectCategory::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
