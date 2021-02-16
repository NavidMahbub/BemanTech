@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Portfolio')

@section('content')

    <div class="bootstrap-wrapper" style="margin: 50px 0;">
        <div class="top_div1 right_div_inner">
            <h1><span class="color">{{ $post->title }}</span></h1>
            <br/>

            <div class="row">
                <div class="col-md-9">
                    @if($post->image)
                        <div style="width: 100%; height: 300px; background-image: url({{ $post->image ? $post->image : asset('image/placeholder.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                    @endif
                    <div>
                        <p style="font-size: 18px;">
                            {!! $post->body !!}
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li class="nav-submenu-item active" style="margin-bottom: 5px;">
                            <h2>Portfolios</h2>
                        </li>
                        <li class="nav-submenu-item"><a href="{{ route('site.portfolio.index') }}" style="color: #0b0b0b">All</a></li>
                        @foreach($list as $item)
                            <li class="nav-submenu-item"><a style="color: #0b0b0b" href="{{ route('site.portfolio.show', ['slug' => $item->slug]) }}">{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
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
