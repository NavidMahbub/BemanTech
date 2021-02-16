<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemPostRequest;

// Model
use App\Models\ItemPost;

class ItemPostController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index($category_id)
    {
        $item_posts = ItemPost::where('item_category_id', $category_id)->get();

        if(!count($item_posts))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ItemPost not available.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $item_posts,
            'code' => 200,
            'status' => 'success',
            'message' => 'ItemPost retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store($category_id, ItemPostRequest $request)
    {
        $item_post = ItemPost::create($request->all());

        if (!$item_post)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'ItemPost cannot be created.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $item_post,
            'code' => 201,
            'status' => 'success',
            'message' => 'ItemPost created successfully.'
        ];

        return response()->json($response, 200);
    }

    public function show($category_id, $id)
    {
        $item_post = ItemPost::find($id);

        if (empty($item_post))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ItemPost not found.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $item_post,
            'code' => 200,
            'status' => 'success',
            'message' => 'ItemPost retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function update($category_id, ItemPostRequest $request, $id)
    {
        $item_post = ItemPost::find($id);

        if (empty($item_post))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ItemPost not found.'
            ];

            return response()->json($response, 404);
        }

        $item_post = ItemPost::find($id)->update($request->all());

        if (!$item_post)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'ItemPost cannot be updated.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $item_post,
            'code' => 201,
            'status' => 'success',
            'message' => 'ItemPost updated successfully.'
        ];

        return response()->json($response, 200);
    }

    public function destroy($category_id, $id)
    {
        $item_post = ItemPost::find($id);

        if (empty($item_post))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'ItemPost not found.'
            ];

            return response()->json($response, 404);
        }

        $item_post = ItemPost::find($id)->delete();

        if (!$item_post)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'ItemPost cannot be deleted.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => '',
            'code' => 201,
            'status' => 'success',
            'message' => 'ItemPost deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
