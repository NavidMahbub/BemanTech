<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioPostRequest;

// Model
use App\Models\PortfolioPost;

class PortfolioPostController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $portfolio_posts = PortfolioPost::all();

        if(!count($portfolio_posts))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'PortfolioPost not available.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $portfolio_posts,
            'code' => 200,
            'status' => 'success',
            'message' => 'PortfolioPost retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store(PortfolioPostRequest $request)
    {
        $portfolio_post = PortfolioPost::create($request->all());

        if (!$portfolio_post)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'PortfolioPost cannot be created.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $portfolio_post,
            'code' => 201,
            'status' => 'success',
            'message' => 'PortfolioPost created successfully.'
        ];

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $portfolio_post = PortfolioPost::find($id);

        if (empty($portfolio_post))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'PortfolioPost not found.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $portfolio_post,
            'code' => 200,
            'status' => 'success',
            'message' => 'PortfolioPost retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function update(PortfolioPostRequest $request, $id)
    {
        $portfolio_post = PortfolioPost::find($id);

        if (empty($portfolio_post))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'PortfolioPost not found.'
            ];

            return response()->json($response, 404);
        }

        $portfolio_post = $portfolio_post = PortfolioPost::find($id)->update($request->all());

        if (!$portfolio_post)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'PortfolioPost cannot be updated.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $portfolio_post,
            'code' => 201,
            'status' => 'success',
            'message' => 'PortfolioPost updated successfully.'
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $portfolio_post = PortfolioPost::find($id);

        if (empty($portfolio_post))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'PortfolioPost not found.'
            ];

            return response()->json($response, 404);
        }

        $portfolio_post = PortfolioPost::find($id)->delete();

        if (!$portfolio_post)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'PortfolioPost cannot be deleted.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => '',
            'code' => 201,
            'status' => 'success',
            'message' => 'PortfolioPost deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
