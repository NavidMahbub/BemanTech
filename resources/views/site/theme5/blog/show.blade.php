@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Blog')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="blog" class="row">
                    <div class="col-md-12 blogShort">
                        <div class="card" style="margin: 40px 0;">
                            <div class="card-body" style="background: #f3f0f040">
                                <h1>{{ $item->title }}</h1>
                                <em>{{ $item->category ? 'Posted In - ' . $item->category->title : ''}}, Posted By - {{ $item->author ? $item->author->name : 'Admin'}}</em>
                                <article>
                                    <p>
                                        {!! $item->body !!}
                                    </p>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-bottom: 40px;">
                        <div class="fb-comments" data-href="{{ route('site.blog.show', ['slug' => $item->slug]) }}" data-width="100%" data-numposts="5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('style')
@stop

@section('script')
@stop
