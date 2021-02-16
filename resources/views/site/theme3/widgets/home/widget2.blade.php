@php
    // models
    use App\Models\ContentCategory;

    // content data
    $post = ContentCategory::where('slug', 'welcome-message')->first();
@endphp

{{--Welcome Message--}}
<div class="container">
    <div class="content_left">
        <article class="my-text">
            {!! $post->body !!}
        </article>
    </div>
    <div class="right_sidebar">
        <div class="right-box">
            <a href="{{ route('site.job.index') }}">
                <img src="{{ asset('image/jobs.jpg') }}" style="width: 80%; float: right;">
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
