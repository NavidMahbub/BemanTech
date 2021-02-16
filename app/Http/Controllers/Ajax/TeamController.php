<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;

// Model
use App\Models\Team;

class TeamController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $teams = Team::all();

        if(!count($teams))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Team not available.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $teams,
            'code' => 200,
            'status' => 'success',
            'message' => 'Team retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store(TeamRequest $request)
    {
        $team = Team::create($request->all());

        if (!$team)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Team cannot be created.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $team,
            'code' => 201,
            'status' => 'success',
            'message' => 'Team created successfully.'
        ];

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $team = Team::find($id);

        if (empty($team))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Team not found.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $team,
            'code' => 200,
            'status' => 'success',
            'message' => 'Team retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function update(TeamRequest $request, $id)
    {
        $team = Team::find($id);

        if (empty($team))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Team not found.'
            ];

            return response()->json($response, 404);
        }

        $team = $team = Team::find($id)->update($request->all());

        if (!$team)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Team cannot be updated.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $team,
            'code' => 201,
            'status' => 'success',
            'message' => 'Team updated successfully.'
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $team = Team::find($id);

        if (empty($team))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Team not found.'
            ];

            return response()->json($response, 404);
        }

        $team = Team::find($id)->delete();

        if (!$team)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Team cannot be deleted.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => '',
            'code' => 201,
            'status' => 'success',
            'message' => 'Team deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
