<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\BlogPost;

class BlogPostRequest extends FormRequest
{
    public function rules()
    {
        $rules = BlogPost::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
