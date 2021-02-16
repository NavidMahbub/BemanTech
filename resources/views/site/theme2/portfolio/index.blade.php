@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Portfolio')

@section('content')

    <div class="bootstrap-wrapper" style="margin: 50px 0;">
        <div class="top_div1 right_div_inner">
            <h1><span class="color">Portfolio</span></h1>
            <br/>

            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        @foreach($list as $item)
                            <div class="col-md-6">
                                <div class="column" style="width: 100%;">
                                    <a href="{{ route('site.portfolio.show', ['slug' => $item->slug]) }}">
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
                <div class="col-md-3">
                    <ul>
                        <li class="nav-submenu-item active" style="margin-bottom: 5px;">
                            <h2>Categories</h2>
                        </li>
                        <li class="nav-submenu-item"><a href="{{ route('site.portfolio.index') }}" style="color: #0b0b0b">All</a></li>
                        @foreach($categories as $category)
                            <li class="nav-submenu-item"><a style="color: #0b0b0b" href="{{ route('site.portfolio.index', ['category_id' => $category->id]) }}">{{ $category->title }}</a></li>
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
