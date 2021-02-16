@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')
    <div class="container" style="margin-top: 60px !important;">
        <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-12">
                <div class="media-image">
                    @if($post->image)
                        <div style="width: 100%; height: 300px; background-image: url('{{ $post->image ? $post->image : url("image/placeholder.jpg") }}'); background-size: cover; background-position: center;"></div>
                    @endif
                    <div class="media-image-body">
                        <h2 class="font-secondary text-uppercase">{{ $post->title }}</h2>
                        <p>Posted by <span style="color:#66BC51;">Admin</span></p>
                        <article>
                            <p>
                                {!! $post->body !!}
                            </p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop