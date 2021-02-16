<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\SettingContact;

class SettingContactRequest extends FormRequest
{
    public function rules()
    {
        $rules = SettingContact::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
