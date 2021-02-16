@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Blog')

@section('content')
    <div class="container" style="margin-top: 60px !important;">
        <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-12">
                <div class="media-image">
                    @if($item->image)
                        <div style="width: 100%; height: 300px; background-image: url('{{ $item->image ? $item->image : url("image/placeholder.jpg") }}'); background-size: cover; background-position: center;"></div>
                    @endif
                    <div class="media-image-body">
                        <h2 class="font-secondary text-uppercase">{{ $item->title }}</h2>
                        <p><em>{{ $item->category ? 'Posted In - ' . $item->category->title : ''}}, Posted By - {{ $item->author ? $item->author->name : 'Admin'}}</em></p>
                        <article>
                            <p>
                                {!! $item->body !!}
                            </p>
                        </article>
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
