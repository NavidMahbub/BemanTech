<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogPostDataTable;
use App\Models\BlogPost;
use Illuminate\Routing\Controller;

class BlogPostController extends Controller
{
    public function index(BlogPostDataTable $datatable)
    {
        return $datatable->render('admin.blog_post.index');
    }

    public function create()
    {
        return view('admin.blog_post.create');
    }

    public function edit($id)
    {
        $dataId = $id;

        if (auth()->user()->type != 0) {

            $blog = BlogPost::findOrFail($dataId);

            if ($blog->created_by != auth()->user()->id) {
                return redirect()->to('admin/blog/post');
            }

        }

        return view('admin.blog_post.edit', compact('dataId'));
    }

    public function approve($id)
    {
        $post = BlogPost::find($id);
        $post->approved = $post->approved == 1 ? 0 : 1;
        $post->update();

        return redirect()->back();
    }
}
