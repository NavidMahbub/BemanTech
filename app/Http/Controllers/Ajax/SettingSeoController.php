<?php

namespace App\Http\Controllers\Ajax;

use App\Models\SettingSeo;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingSeoRequest;

class SettingSeoController extends Controller
{
    public function index()
    {
        $setting = SettingSeo::first();

        $response = [
            'data' => $setting,
            'code' => 201,
            'status' => 'success',
            'message' => 'Settings retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store(SettingSeoRequest $request)
    {
        $setting = SettingSeo::updateOrCreate(['id' => $request->id], $request->all());

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
