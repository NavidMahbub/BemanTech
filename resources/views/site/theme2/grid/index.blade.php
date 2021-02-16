@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')


    <div class="bootstrap-wrapper" style="margin: 50px 0;">
        <div class="top_div1 right_div_inner">
            <h1><span class="color">{{ $category->title }}</span></h1>
            <br/>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        @foreach($list as $item)
                            <div class="col-md-4">
                                <div class="column" style="width: 100%;">
                                    <a href="{{ route('site.item.post.show', ['category_slug' => $category->slug, 'post_slug' => $item->slug]) }}">
                                        <div class="team-member">
                                            <div class="team-img">
                                                <img style="width: 100%;" src="{{ $item->image ? $item->image : asset('image/placeholder.jpg') }}" alt="team member" class="img-responsive">
                                            </div>
                                            <h2>{{ $item->title }}</h2>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! $list->links() !!}
                        </div>
                    </div>
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
