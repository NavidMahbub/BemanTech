<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemCategoryRequest;

// Model
use App\Models\ItemCategory;

class ItemCategoryController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $item_categories = ItemCategory::all();

        if(!count($item_categories))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ItemCategory not available.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $item_categories,
            'code' => 200,
            'status' => 'success',
            'message' => 'ItemCategory retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store(ItemCategoryRequest $request)
    {
        $item_category = ItemCategory::create($request->all());

        if (!$item_category)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'ItemCategory cannot be created.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $item_category,
            'code' => 201,
            'status' => 'success',
            'message' => 'ItemCategory created successfully.'
        ];

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $item_category = ItemCategory::find($id);

        if (empty($item_category))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ItemCategory not found.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $item_category,
            'code' => 200,
            'status' => 'success',
            'message' => 'ItemCategory retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function update(ItemCategoryRequest $request, $id)
    {
        $item_category = ItemCategory::find($id);

        if (empty($item_category))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ItemCategory not found.'
            ];

            return response()->json($response, 404);
        }

        $item_category = $item_category = ItemCategory::find($id)->update($request->all());

        if (!$item_category)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'ItemCategory cannot be updated.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $item_category,
            'code' => 201,
            'status' => 'success',
            'message' => 'ItemCategory updated successfully.'
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $item_category = ItemCategory::find($id);

        if (empty($item_category))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ItemCategory not found.'
            ];

            return response()->json($response, 404);
        }

        $item_category = ItemCategory::find($id)->delete();

        if (!$item_category)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'ItemCategory cannot be deleted.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => '',
            'code' => 201,
            'status' => 'success',
            'message' => 'ItemCategory deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
