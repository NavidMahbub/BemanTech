<?php

namespace App\Http\Controllers\Ajax;

use App\Models\SettingSite;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingSiteRequest;

class SettingSiteController extends Controller
{
    public function index()
    {
        $setting = SettingSite::first();

        $response = [
            'data' => $setting,
            'code' => 201,
            'status' => 'success',
            'message' => 'Settings retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store(SettingSiteRequest $request)
    {
        $setting = SettingSite::updateOrCreate(['id' => $request->id], $request->all());

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
