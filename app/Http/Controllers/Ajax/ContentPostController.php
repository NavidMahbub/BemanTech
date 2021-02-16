<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContentPostRequest;

// Model
use App\Models\ContentPost;

class ContentPostController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index($category_id)
    {
        $content_posts = ContentPost::where('content_category_id', $category_id)->get();

        if(!count($content_posts))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ContentPost not available.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $content_posts,
            'code' => 200,
            'status' => 'success',
            'message' => 'ContentPost retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store($category_id, ContentPostRequest $request)
    {
        $content_post = ContentPost::create($request->all());

        if (!$content_post)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'ContentPost cannot be created.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $content_post,
            'code' => 201,
            'status' => 'success',
            'message' => 'ContentPost created successfully.'
        ];

        return response()->json($response, 200);
    }

    public function show($category_id, $id)
    {
        $content_post = ContentPost::find($id);

        if (empty($content_post))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ContentPost not found.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $content_post,
            'code' => 200,
            'status' => 'success',
            'message' => 'ContentPost retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function update($category_id, ContentPostRequest $request, $id)
    {
        $content_post = ContentPost::find($id);

        if (empty($content_post))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ContentPost not found.'
            ];

            return response()->json($response, 404);
        }

        $content_post = $content_post = ContentPost::find($id)->update($request->all());

        if (!$content_post)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'ContentPost cannot be updated.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $content_post,
            'code' => 201,
            'status' => 'success',
            'message' => 'ContentPost updated successfully.'
        ];

        return response()->json($response, 200);
    }

    public function destroy($category_id, $id)
    {
        $content_post = ContentPost::find($id);

        if (empty($content_post))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ContentPost not found.'
            ];

            return response()->json($response, 404);
        }

        $content_post = ContentPost::find($id)->delete();

        if (!$content_post)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'ContentPost cannot be deleted.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => '',
            'code' => 201,
            'status' => 'success',
            'message' => 'ContentPost deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
