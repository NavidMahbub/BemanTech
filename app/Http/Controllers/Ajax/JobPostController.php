<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;

// Model
use App\Models\Job;

class JobPostController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $jobs = Job::where('type', 0)->get();

        if(!count($jobs))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Job not available.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $jobs,
            'code' => 200,
            'status' => 'success',
            'message' => 'Job retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store(JobRequest $request)
    {
        $job = Job::create($request->all());

        if (!$job)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Job cannot be created.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $job,
            'code' => 201,
            'status' => 'success',
            'message' => 'Job created successfully.'
        ];

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $job = Job::find($id);

        if (empty($job))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Job not found.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $job,
            'code' => 200,
            'status' => 'success',
            'message' => 'Job retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function update(JobRequest $request, $id)
    {
        $job = Job::find($id);

        if (empty($job))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Job not found.'
            ];

            return response()->json($response, 404);
        }

        $job = $job = Job::find($id)->update($request->all());

        if (!$job)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Job cannot be updated.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $job,
            'code' => 201,
            'status' => 'success',
            'message' => 'Job updated successfully.'
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $job = Job::find($id);

        if (empty($job))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Job not found.'
            ];

            return response()->json($response, 404);
        }

        $job = Job::find($id)->delete();

        if (!$job)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Job cannot be deleted.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => '',
            'code' => 201,
            'status' => 'success',
            'message' => 'Job deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
