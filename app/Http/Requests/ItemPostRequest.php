<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\ItemPost;

class ItemPostRequest extends FormRequest
{
    public function rules()
    {
        $rules = ItemPost::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
