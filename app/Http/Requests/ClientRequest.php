<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\Client;

class ClientRequest extends FormRequest
{
    public function rules()
    {
        $rules = Client::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
