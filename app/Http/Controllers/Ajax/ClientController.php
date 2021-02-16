<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;

// Model
use App\Models\Client;

class ClientController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $clients = Client::all();

        if(!count($clients))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Client not available.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $clients,
            'code' => 200,
            'status' => 'success',
            'message' => 'Client retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store(ClientRequest $request)
    {
        $client = Client::create($request->all());

        if (!$client)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Client cannot be created.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $client,
            'code' => 201,
            'status' => 'success',
            'message' => 'Client created successfully.'
        ];

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $client = Client::find($id);

        if (empty($client))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Client not found.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $client,
            'code' => 200,
            'status' => 'success',
            'message' => 'Client retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function update(ClientRequest $request, $id)
    {
        $client = Client::find($id);

        if (empty($client))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Client not found.'
            ];

            return response()->json($response, 404);
        }

        $client = $client = Client::find($id)->update($request->all());

        if (!$client)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Client cannot be updated.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $client,
            'code' => 201,
            'status' => 'success',
            'message' => 'Client updated successfully.'
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $client = Client::find($id);

        if (empty($client))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Client not found.'
            ];

            return response()->json($response, 404);
        }

        $client = Client::find($id)->delete();

        if (!$client)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Client cannot be deleted.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => '',
            'code' => 201,
            'status' => 'success',
            'message' => 'Client deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
