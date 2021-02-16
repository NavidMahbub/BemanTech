<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\PortfolioPost;

class PortfolioPostRequest extends FormRequest
{
    public function rules()
    {
        $rules = PortfolioPost::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
