<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\Team;

class TeamRequest extends FormRequest
{
    public function rules()
    {
        $rules = Team::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
