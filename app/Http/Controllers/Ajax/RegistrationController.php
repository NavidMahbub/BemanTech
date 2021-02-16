<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;

// Model
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $clients = Registration::all();

        if(!count($clients))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Registration not available.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $clients,
            'code' => 200,
            'status' => 'success',
            'message' => 'Registration retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store(RegistrationRequest $request)
    {
        $client = Registration::create($request->all());

        if (!$client)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Registration cannot be created.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $client,
            'code' => 201,
            'status' => 'success',
            'message' => 'Registration created successfully.'
        ];

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $client = Registration::find($id);

        if (empty($client))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Registration not found.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $client,
            'code' => 200,
            'status' => 'success',
            'message' => 'Registration retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function update(RegistrationRequest $request, $id)
    {
        $client = Registration::find($id);

        if (empty($client))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Registration not found.'
            ];

            return response()->json($response, 404);
        }

        $client = $client = Registration::find($id)->update($request->all());

        if (!$client)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Registration cannot be updated.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $client,
            'code' => 201,
            'status' => 'success',
            'message' => 'Registration updated successfully.'
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $client = Registration::find($id);

        if (empty($client))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Registration not found.'
            ];

            return response()->json($response, 404);
        }

        $client = Registration::find($id)->delete();

        if (!$client)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Registration cannot be deleted.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => '',
            'code' => 201,
            'status' => 'success',
            'message' => 'Registration deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
