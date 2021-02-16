<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;

// Model
use App\Models\Slider;

class SliderController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $sliders = Slider::all();

        if(!count($sliders))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Slider not available.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $sliders,
            'code' => 200,
            'status' => 'success',
            'message' => 'Slider retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store(SliderRequest $request)
    {
        $slider = Slider::create($request->all());

        if (!$slider)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Slider cannot be created.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $slider,
            'code' => 201,
            'status' => 'success',
            'message' => 'Slider created successfully.'
        ];

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $slider = Slider::find($id);

        if (empty($slider))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Slider not found.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $slider,
            'code' => 200,
            'status' => 'success',
            'message' => 'Slider retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function update(SliderRequest $request, $id)
    {
        $slider = Slider::find($id);

        if (empty($slider))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Slider not found.'
            ];

            return response()->json($response, 404);
        }

        $slider = $slider = Slider::find($id)->update($request->all());

        if (!$slider)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Slider cannot be updated.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $slider,
            'code' => 201,
            'status' => 'success',
            'message' => 'Slider updated successfully.'
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);

        if (empty($slider))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'Slider not found.'
            ];

            return response()->json($response, 404);
        }

        $slider = Slider::find($id)->delete();

        if (!$slider)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'Slider cannot be deleted.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => '',
            'code' => 201,
            'status' => 'success',
            'message' => 'Slider deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
