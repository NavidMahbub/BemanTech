<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectPostRequest;

// Model
use App\Models\ProjectPost;

class ProjectPostController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $project_posts = ProjectPost::all();

        if(!count($project_posts))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ProjectPost not available.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $project_posts,
            'code' => 200,
            'status' => 'success',
            'message' => 'ProjectPost retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store(ProjectPostRequest $request)
    {
        // get all requests
        $data = $request->all();

        // add json encoded body value
        $data['body'] = json_encode($data['body']);

        $project_post = ProjectPost::create($data);

        if (!$project_post)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'ProjectPost cannot be created.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $project_post,
            'code' => 201,
            'status' => 'success',
            'message' => 'ProjectPost created successfully.'
        ];

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $project_post = ProjectPost::find($id);

        if (empty($project_post))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ProjectPost not found.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $project_post,
            'code' => 200,
            'status' => 'success',
            'message' => 'ProjectPost retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function update(ProjectPostRequest $request, $id)
    {
        $project_post = ProjectPost::find($id);

        if (empty($project_post))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ProjectPost not found.'
            ];

            return response()->json($response, 404);
        }

        // get all requests
        $data = $request->all();

        // add json encoded body value
        $data['body'] = json_encode($data['body']);

        $project_post = $project_post = ProjectPost::find($id)->update($data);

        if (!$project_post)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'ProjectPost cannot be updated.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $project_post,
            'code' => 201,
            'status' => 'success',
            'message' => 'ProjectPost updated successfully.'
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $project_post = ProjectPost::find($id);

        if (empty($project_post))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ProjectPost not found.'
            ];

            return response()->json($response, 404);
        }

        $project_post = ProjectPost::find($id)->delete();

        if (!$project_post)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'ProjectPost cannot be deleted.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => '',
            'code' => 201,
            'status' => 'success',
            'message' => 'ProjectPost deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
