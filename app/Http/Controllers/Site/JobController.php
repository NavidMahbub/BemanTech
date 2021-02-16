<?php

namespace App\Http\Controllers\Site;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Helpers\UploadHelper;
use App\Models\JobApplication;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class JobController extends Controller
{
    use UploadHelper;

    public function index()
    {
        // galleries
        $list = Job::where('status', 1)->paginate(15);

        return view('site.' . config('cms.theme') . '.job.index', compact('list'));
    }

    public function show($job_slug)
    {
        // list
        $list = Job::where('status', 1)->latest()->get()->take(10);

        // post
        $post = Job::where('slug', $job_slug)->first();

        if (empty($post))
        {
            abort(404);
        }

        return view('site.' . config('cms.theme') . '.job.show', compact('list', 'post'));
    }

    public function apply($job_slug)
    {
        // list
        $list = Job::where('status', 1)->latest()->get()->take(10);

        // post
        $post = Job::where('slug', $job_slug)->first();

        return view('site.theme3.job.apply', compact('post', 'list'));
    }

    public function applySubmit(Request $request)
    {
        // request validation
        $request->validate(JobApplication::$rules);

        // request data
        $data = $request->all();

        if ($request->hasFile('resume'))
        {
            // upload path
            $path = 'resume';

            // file prefix
            $prefix = 'resume';

            // upload file
            $file = $request->resume;

            // uploaded file
            $data['resume'] = $this->uploadFile($file, $path, $prefix);
        }

        JobApplication::create($data);

        Session::flash('message', 'Application submitted successfully!');

        return redirect()->back();
    }

    public function post()
    {
        // list
        $list = Job::where('status', 1)->latest()->get()->take(10);

        return view('site.theme3.job.post', compact( 'list'));
    }

    public function postSubmit(Request $request)
    {
        // request validation
        $request->validate(Job::$rules);

        // request data
        $data = $request->all();

        if ($request->hasFile('attachment'))
        {
            // upload path
            $path = 'attachment';

            // file prefix
            $prefix = 'attachment';

            // upload file
            $file = $request->attachment;

            // uploaded file
            $data['attachment'] = $this->uploadFile($file, $path, $prefix);
        }
        
        $data['type'] = 1;

        Job::create($data);

        Session::flash('message', 'Job posting has been successful!');

        return redirect()->back();
    }
}
