<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\PortfolioCategory;

class PortfolioCategoryRequest extends FormRequest
{
    public function rules()
    {
        $rules = PortfolioCategory::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
