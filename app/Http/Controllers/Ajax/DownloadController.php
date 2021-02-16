<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\DownloadRequest;

// Model
use App\Models\Download;

class DownloadController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $downloads = Download::all();

        if(!count($downloads))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Download not available.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $downloads,
            'code' => 200,
            'status' => 'success',
            'message' => 'Download retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store(DownloadRequest $request)
    {
        $download = Download::create($request->all());

        if (!$download)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Download cannot be created.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $download,
            'code' => 201,
            'status' => 'success',
            'message' => 'Download created successfully.'
        ];

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $download = Download::find($id);

        if (empty($download))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Download not found.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $download,
            'code' => 200,
            'status' => 'success',
            'message' => 'Download retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function update(DownloadRequest $request, $id)
    {
        $download = Download::find($id);

        if (empty($download))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Download not found.'
            ];

            return response()->json($response, 404);
        }

        $download = $download = Download::find($id)->update($request->all());

        if (!$download)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Download cannot be updated.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $download,
            'code' => 201,
            'status' => 'success',
            'message' => 'Download updated successfully.'
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $download = Download::find($id);

        if (empty($download))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Download not found.'
            ];

            return response()->json($response, 404);
        }

        $download = Download::find($id)->delete();

        if (!$download)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Download cannot be deleted.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => '',
            'code' => 201,
            'status' => 'success',
            'message' => 'Download deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
