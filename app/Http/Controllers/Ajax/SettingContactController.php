<?php

namespace App\Http\Controllers\Ajax;

use App\Models\SettingContact;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingContactRequest;

class SettingContactController extends Controller
{
    public function index()
    {
        $setting = SettingContact::first();

        $response = [
            'data' => $setting,
            'code' => 201,
            'status' => 'success',
            'message' => 'Settings retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store(SettingContactRequest $request)
    {
        $setting = SettingContact::updateOrCreate(['id' => $request->id], $request->all());

        if (!$setting)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Settings cannot be updated.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $setting,
            'code' => 201,
            'status' => 'success',
            'message' => 'Settings updated successfully.'
        ];

        return response()->json($response, 200);
    }
}
