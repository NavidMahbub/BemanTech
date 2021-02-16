<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioCategoryRequest;

// Model
use App\Models\PortfolioCategory;

class PortfolioCategoryController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $portfolio_categories = PortfolioCategory::all();

        if(!count($portfolio_categories))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'PortfolioCategory not available.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $portfolio_categories,
            'code' => 200,
            'status' => 'success',
            'message' => 'PortfolioCategory retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store(PortfolioCategoryRequest $request)
    {
        $portfolio_category = PortfolioCategory::create($request->all());

        if (!$portfolio_category)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'PortfolioCategory cannot be created.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $portfolio_category,
            'code' => 201,
            'status' => 'success',
            'message' => 'PortfolioCategory created successfully.'
        ];

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $portfolio_category = PortfolioCategory::find($id);

        if (empty($portfolio_category))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'PortfolioCategory not found.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $portfolio_category,
            'code' => 200,
            'status' => 'success',
            'message' => 'PortfolioCategory retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function update(PortfolioCategoryRequest $request, $id)
    {
        $portfolio_category = PortfolioCategory::find($id);

        if (empty($portfolio_category))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'PortfolioCategory not found.'
            ];

            return response()->json($response, 404);
        }

        $portfolio_category = $portfolio_category = PortfolioCategory::find($id)->update($request->all());

        if (!$portfolio_category)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'PortfolioCategory cannot be updated.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $portfolio_category,
            'code' => 201,
            'status' => 'success',
            'message' => 'PortfolioCategory updated successfully.'
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $portfolio_category = PortfolioCategory::find($id);

        if (empty($portfolio_category))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'PortfolioCategory not found.'
            ];

            return response()->json($response, 404);
        }

        $portfolio_category = PortfolioCategory::find($id)->delete();

        if (!$portfolio_category)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'PortfolioCategory cannot be deleted.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => '',
            'code' => 201,
            'status' => 'success',
            'message' => 'PortfolioCategory deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
