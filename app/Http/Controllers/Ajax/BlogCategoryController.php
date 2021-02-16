<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategoryRequest;

// Model
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $blog_categories = BlogCategory::all();

        if(!count($blog_categories))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'BlogCategory not available.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $blog_categories,
            'code' => 200,
            'status' => 'success',
            'message' => 'BlogCategory retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store(BlogCategoryRequest $request)
    {
        $blog_category = BlogCategory::create($request->all());

        if (!$blog_category)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'BlogCategory cannot be created.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $blog_category,
            'code' => 201,
            'status' => 'success',
            'message' => 'BlogCategory created successfully.'
        ];

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $blog_category = BlogCategory::find($id);

        if (empty($blog_category))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'BlogCategory not found.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $blog_category,
            'code' => 200,
            'status' => 'success',
            'message' => 'BlogCategory retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function update(BlogCategoryRequest $request, $id)
    {
        $blog_category = BlogCategory::find($id);

        if (empty($blog_category))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'BlogCategory not found.'
            ];

            return response()->json($response, 404);
        }

        $blog_category = $blog_category = BlogCategory::find($id)->update($request->all());

        if (!$blog_category)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'BlogCategory cannot be updated.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $blog_category,
            'code' => 201,
            'status' => 'success',
            'message' => 'BlogCategory updated successfully.'
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $blog_category = BlogCategory::find($id);

        if (empty($blog_category))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'BlogCategory not found.'
            ];

            return response()->json($response, 404);
        }

        $blog_category = BlogCategory::find($id)->delete();

        if (!$blog_category)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'BlogCategory cannot be deleted.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => '',
            'code' => 201,
            'status' => 'success',
            'message' => 'BlogCategory deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
