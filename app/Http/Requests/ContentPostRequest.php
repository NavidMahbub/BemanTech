<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\ContentPost;

class ContentPostRequest extends FormRequest
{
    public function rules()
    {
        $rules = ContentPost::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
