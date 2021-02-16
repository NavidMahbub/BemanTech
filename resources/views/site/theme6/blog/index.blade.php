@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Blog')

@section('content')
    <div class="container" style="margin-top: 60px !important;">
        <div class="row" style="margin-bottom: 30px;">
            @foreach($list as $item)
                <div class="col-md-12 mb-4" style="cursor: pointer;">
                    <div class="card" onclick="window.location.href='{{ route('site.blog.show', ['slug' => $item->slug]) }}'">
                        <div class="row">
                            <div class="col-4">
                                <div class="media-image">
                                    <img src="{{ $item->image ? $item->image : url('image/placeholder.jpg') }}" alt="{{ $item->title }}" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="media-image-body" style="padding-top: 30px !important;">
                                    <h2 class="font-secondary text-uppercase">{{ $item->title }}</h2>
                                    <p>Posted by <span style="color:#66BC51;">Admin</span></p>
                                    <p>{!! substr($item->body, 0, 80) !!}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-12">
                <nav>
                    {!! $list->links() !!}
                </nav>
            </div>
        </div>
    </div>
@stop