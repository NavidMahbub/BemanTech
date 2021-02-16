<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;

// Model
use App\Models\JobApplication;

class JobApplicationController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $jobs = JobApplication::all();

        if(!count($jobs))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'JobApplication not available.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $jobs,
            'code' => 200,
            'status' => 'success',
            'message' => 'JobApplication retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $job = JobApplication::with('job')->find($id);

        if (empty($job))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'JobApplication not found.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $job,
            'code' => 200,
            'status' => 'success',
            'message' => 'JobApplication retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $job = JobApplication::find($id);

        if (empty($job))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'JobApplication not found.'
            ];

            return response()->json($response, 404);
        }

        $job = JobApplication::find($id)->delete();

        if (!$job)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'JobApplication cannot be deleted.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => '',
            'code' => 201,
            'status' => 'success',
            'message' => 'JobApplication deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
