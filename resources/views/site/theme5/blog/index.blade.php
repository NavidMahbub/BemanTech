@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Blog')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="blog" class="row" style="margin-top: 30px;">
                    <div class="col-md-12 blogShort">
                        @foreach($list as $item)
                        <div class="card" style="margin: 20px 0;">
                            <div class="card-body" style="background: #f3f0f040">
                                <h1>{{ $item->title }}</h1>
                                <em>{{ $item->category ? 'Posted In - ' . $item->category->title : ''}}, Posted By - {{ $item->author ? $item->author->name : 'Admin'}}</em>
                                <article>
                                    <p>
                                        {!! substr($item->body, 0, 300) !!}
                                    </p>
                                </article>
                                <a class="btn btn-blog pull-right marginBotto.m10"
                                   href="{{ route('site.blog.show', ['slug' => $item->slug]) }}">READ MORE</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-12">
                        {!! $list->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('style')
    <style>
        .add{background: #333; padding: 10%; height: 300px;}

        .nav-sidebar {
            width: 100%;
            padding: 8px 0;
            border-right: 1px solid #ddd;
        }
        .nav-sidebar a {
            color: #333;
            -webkit-transition: all 0.08s linear;
            -moz-transition: all 0.08s linear;
            -o-transition: all 0.08s linear;
            transition: all 0.08s linear;
        }
        .nav-sidebar .active a {
            cursor: default;
            background-color: #34ca78;
            color: #fff;
        }
        .nav-sidebar .active a:hover {
            background-color: #37D980;
        }
        .nav-sidebar .text-overflow a,
        .nav-sidebar .text-overflow .media-body {
            white-space: nowrap;
            overflow: hidden;
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
        }

        .btn-blog {
            color: #ffffff;
            background-color: #37d980;
            border-color: #37d980;
            border-radius:0;
            margin-bottom:10px
        }
        .btn-blog:hover,
        .btn-blog:focus,
        .btn-blog:active,
        .btn-blog.active,
        .open .dropdown-toggle.btn-blog {
            color: white;
            background-color:#34ca78;
            border-color: #34ca78;
        }
        h2{color:#34ca78;}
        .margin10{margin-bottom:10px; margin-right:10px;}
    </style>
@stop

@section('script')
@stop
