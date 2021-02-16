<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContentCategoryRequest;

// Model
use App\Models\ContentCategory;

class ContentCategoryController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        if (request()->has('has_child'))
        {
            $content_categories = ContentCategory::where('has_child', 1)->get();
        }
        else
        {
            $content_categories = ContentCategory::all();
        }

        if(!count($content_categories))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ContentCategory not available.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $content_categories,
            'code' => 200,
            'status' => 'success',
            'message' => 'ContentCategory retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store(ContentCategoryRequest $request)
    {
        $content_category = ContentCategory::create($request->all());

        if (!$content_category)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'ContentCategory cannot be created.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $content_category,
            'code' => 201,
            'status' => 'success',
            'message' => 'ContentCategory created successfully.'
        ];

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $content_category = ContentCategory::find($id);

        if (empty($content_category))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ContentCategory not found.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $content_category,
            'code' => 200,
            'status' => 'success',
            'message' => 'ContentCategory retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function update(ContentCategoryRequest $request, $id)
    {
        $content_category = ContentCategory::find($id);

        if (empty($content_category))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ContentCategory not found.'
            ];

            return response()->json($response, 404);
        }

        $content_category = $content_category = ContentCategory::find($id)->update($request->all());

        if (!$content_category)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'ContentCategory cannot be updated.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $content_category,
            'code' => 201,
            'status' => 'success',
            'message' => 'ContentCategory updated successfully.'
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $content_category = ContentCategory::find($id);

        if (empty($content_category))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ContentCategory not found.'
            ];

            return response()->json($response, 404);
        }

        $content_category = ContentCategory::find($id)->delete();

        if (!$content_category)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'ContentCategory cannot be deleted.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => '',
            'code' => 201,
            'status' => 'success',
            'message' => 'ContentCategory deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
