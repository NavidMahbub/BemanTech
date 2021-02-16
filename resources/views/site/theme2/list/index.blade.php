@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')


    <div class="bootstrap-wrapper" style="margin-top: 50px;">
        <div class="top_div1 right_div_inner">
            <h1><span class="color">{{ $category->title }}</span></h1>
            <br/>

            @foreach($list as $item)
                <section class="post" style="margin: 40px 0; width: 100%;background: #efefef6e; padding: 30px;">
                    <header class="post-header">
                        <a href="{{ route('site.item.post.show', ['category_slug' => $category->slug, 'post_slug' => $item->slug]) }}"><h2 class="post-title">{{ $item->title }}</h2></a>
                        <p class="post-meta" style="font-size: 16px">
                            Published: {{ $item->created_at->diffForHumans() }}, By <a href="javascript:void(0)" class="post-author">Admin</a>
                        </p>
                    </header>
                    <div class="post-description">
                        <p style="font-size: 16px;">
                            {!! substr($item->body, 0, 460) !!}
                        </p>
                        <p><a style="float: right; font-size: 15px;" href="{{ route('site.item.post.show', ['category_slug' => $category->slug, 'post_slug' => $item->slug]) }}">Read More</a></p>
                    </div>
                </section>
            @endforeach

            <div class="row">
                <div class="col-md-12">
                    {!! $list->links() !!}
                </div>
            </div>

        </div>

        <div class="clear"></div>
    </div>

@stop

@section('style')
@stop

@section('script')
@stop
