<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\Gallery;

class GalleryRequest extends FormRequest
{
    public function rules()
    {
        $rules = Gallery::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
