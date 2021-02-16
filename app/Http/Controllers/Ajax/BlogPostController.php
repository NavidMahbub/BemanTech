<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostRequest;

// Model
use App\Models\BlogPost;

class BlogPostController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        if (auth()->user()->type == 0) {
            $blog_posts = BlogPost::all();
        } else {
            $blog_posts = BlogPost::where('created_by', auth()->user()->id)->get();
        }

        if(!count($blog_posts))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'BlogPost not available.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $blog_posts,
            'code' => 200,
            'status' => 'success',
            'message' => 'BlogPost retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store(BlogPostRequest $request)
    {
        $blog_post = BlogPost::create($request->all());

        if (!$blog_post)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'BlogPost cannot be created.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $blog_post,
            'code' => 201,
            'status' => 'success',
            'message' => 'BlogPost created successfully.'
        ];

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $blog_post = BlogPost::find($id);

        if (empty($blog_post))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'BlogPost not found.'
            ];

            return response()->json($response, 404);
        }

        if (auth()->user()->type != 0) {

            if ($blog_post->created_by != auth()->user()->id) {

                $response = [
                    'data' => '',
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'BlogPost not found.'
                ];

                return response()->json($response, 404);
            }

        }

        $response = [
            'data' => $blog_post,
            'code' => 200,
            'status' => 'success',
            'message' => 'BlogPost retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function update(BlogPostRequest $request, $id)
    {
        $blog_post = BlogPost::find($id);

        if (empty($blog_post))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'BlogPost not found.'
            ];

            return response()->json($response, 404);
        }

        if (auth()->user()->type != 0) {

            if ($blog_post->created_by != auth()->user()->id) {

                $response = [
                    'data' => '',
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'BlogPost not found.'
                ];

                return response()->json($response, 404);
            }

        }

        $blog_post = $blog_post = BlogPost::find($id)->update($request->all());

        if (!$blog_post)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'BlogPost cannot be updated.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $blog_post,
            'code' => 201,
            'status' => 'success',
            'message' => 'BlogPost updated successfully.'
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $blog_post = BlogPost::find($id);

        if (empty($blog_post))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'BlogPost not found.'
            ];

            return response()->json($response, 404);
        }

        if (auth()->user()->type != 0) {

            if ($blog_post->created_by != auth()->user()->id) {

                $response = [
                    'data' => '',
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'BlogPost not found.'
                ];

                return response()->json($response, 404);
            }

        }

        $blog_post = BlogPost::find($id)->delete();

        if (!$blog_post)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'BlogPost cannot be deleted.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => '',
            'code' => 201,
            'status' => 'success',
            'message' => 'BlogPost deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
