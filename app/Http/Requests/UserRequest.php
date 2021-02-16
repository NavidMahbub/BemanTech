<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\User;

class UserRequest extends FormRequest
{
    public function rules()
    {
        $rules = User::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
