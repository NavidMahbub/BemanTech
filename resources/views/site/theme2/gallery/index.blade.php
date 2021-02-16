@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Gallery')

@section('content')

    <div class="bootstrap-wrapper" style="margin: 50px 0;">
        <div class="top_div1 right_div_inner">
            <h1><span class="color">Gallery</span></h1>
            <br/>

            <div class="row">
                @foreach($list as $item)
                    <div class="col-md-4">
                        <div class="column" style="width: 100%;">
                            <div class="team-member">
                                <div class="team-img">
                                    <a class="image-link" href="{{ $item->image ? $item->image : asset('image/placeholder.jpg') }}">
                                        <img style="width: 100%;" src="{{ $item->image ? $item->image : asset('image/placeholder.jpg') }}" alt="team member" class="img-responsive">
                                    </a>
                                </div>
                            </div>
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

        <div class="clear"></div>
    </div>

@stop

@section('style')
@stop

@section('script')
@stop
