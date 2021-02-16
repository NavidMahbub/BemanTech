<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\Download;

class DownloadRequest extends FormRequest
{
    public function rules()
    {
        $rules = Download::$rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
