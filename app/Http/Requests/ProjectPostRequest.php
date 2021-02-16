<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\ProjectPost;

class ProjectPostRequest extends FormRequest
{
    public function rules()
    {
        $rules = ProjectPost::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
