<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\ItemCategory;

class ItemCategoryRequest extends FormRequest
{
    public function rules()
    {
        $rules = ItemCategory::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
