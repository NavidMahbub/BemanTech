<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectCategoryRequest;

// Model
use App\Models\ProjectCategory;

class ProjectCategoryController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $project_categories = ProjectCategory::all();

        if(!count($project_categories))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ProjectCategory not available.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $project_categories,
            'code' => 200,
            'status' => 'success',
            'message' => 'ProjectCategory retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store(ProjectCategoryRequest $request)
    {
        $project_category = ProjectCategory::create($request->all());

        if (!$project_category)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'ProjectCategory cannot be created.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $project_category,
            'code' => 201,
            'status' => 'success',
            'message' => 'ProjectCategory created successfully.'
        ];

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $project_category = ProjectCategory::find($id);

        if (empty($project_category))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ProjectCategory not found.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $project_category,
            'code' => 200,
            'status' => 'success',
            'message' => 'ProjectCategory retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function update(ProjectCategoryRequest $request, $id)
    {
        $project_category = ProjectCategory::find($id);

        if (empty($project_category))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ProjectCategory not found.'
            ];

            return response()->json($response, 404);
        }

        $project_category = $project_category = ProjectCategory::find($id)->update($request->all());

        if (!$project_category)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'ProjectCategory cannot be updated.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $project_category,
            'code' => 201,
            'status' => 'success',
            'message' => 'ProjectCategory updated successfully.'
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $project_category = ProjectCategory::find($id);

        if (empty($project_category))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ProjectCategory not found.'
            ];

            return response()->json($response, 404);
        }

        $project_category = ProjectCategory::find($id)->delete();

        if (!$project_category)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'ProjectCategory cannot be deleted.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => '',
            'code' => 201,
            'status' => 'success',
            'message' => 'ProjectCategory deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
