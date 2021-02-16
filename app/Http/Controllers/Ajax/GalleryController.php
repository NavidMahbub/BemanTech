<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;

// Model
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $galleries = Gallery::all();

        if(!count($galleries))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Gallery not available.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $galleries,
            'code' => 200,
            'status' => 'success',
            'message' => 'Gallery retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store(GalleryRequest $request)
    {
        $gallery = Gallery::create($request->all());

        if (!$gallery)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Gallery cannot be created.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $gallery,
            'code' => 201,
            'status' => 'success',
            'message' => 'Gallery created successfully.'
        ];

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $gallery = Gallery::find($id);

        if (empty($gallery))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Gallery not found.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $gallery,
            'code' => 200,
            'status' => 'success',
            'message' => 'Gallery retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function update(GalleryRequest $request, $id)
    {
        $gallery = Gallery::find($id);

        if (empty($gallery))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Gallery not found.'
            ];

            return response()->json($response, 404);
        }

        $gallery = $gallery = Gallery::find($id)->update($request->all());

        if (!$gallery)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Gallery cannot be updated.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $gallery,
            'code' => 201,
            'status' => 'success',
            'message' => 'Gallery updated successfully.'
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);

        if (empty($gallery))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Gallery not found.'
            ];

            return response()->json($response, 404);
        }

        $gallery = Gallery::find($id)->delete();

        if (!$gallery)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Gallery cannot be deleted.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => '',
            'code' => 201,
            'status' => 'success',
            'message' => 'Gallery deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
