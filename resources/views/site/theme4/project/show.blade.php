@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')
    <tr>
        <td colspan="2" valign="top">
            <table width="1080" border="0">
                <tr>
                    <td valign="top" width="250" >
                        <div id="menulft" style="font-weight:bold; ">
                            <ul>
                                <li><a href="{{ route('site.portfolio.index') }}">All</a></li>
                                @foreach($list as $item)
                                    <li><a href="{{ route('site.project.show', ['slug' => $item->slug]) }}">{{ substr($item->title, 0, 28) }} {{ strlen($item->title) > 28 ? '..' : '' }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </td>
                    <td valign="top" width="830" >
                        <table width="100%" border="0">
                            <tr valign="top">
                                <td style="line-height:25px; padding-left:30px">
                                    @php
                                        $categories = \App\Models\ProjectCategory::where('status', 1)->latest()->get()->take(4);
                                    @endphp
                                    @foreach($categories as $category)
                                        <a style="margin-top: 30px; display: inline-block" href="{{ route('site.project.index', ['category_id' => $category->id]) }}">
                                            <img style="width: 150px;" src="{{ $category->image ? $category->image : asset('image/placeholder.jpg') }}" border="0" class="widgetBlockIndex" />
                                        </a>
                                    @endforeach
                                </td>
                            </tr>
                            <tr valign="top">
                                <td style="line-height:25px; padding-left:30px">
                                    <p>
                                    <h1 style="font-size:22px; color:#66BC51;">
                                        <strong>{!! $post->title !!}</strong>
                                    </h1>
                                    <div class="bootstrap-wrapper">
                                        <div class="row" style="margin-bottom: 30px;">
                                            <div class="col-md-12" style="width: 830px !important;">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        @if($post->body)
                                                            <div class="blog-content-area mt-30">
                                                                @php
                                                                    $data = json_decode($post->body);
                                                                @endphp
                                                                <div class="tab_wrapper demo">

                                                                    <ul class="tab_list">
                                                                        @foreach($data as $index1 => $datum)
                                                                            <li class="nav-item">
                                                                                <a class="{{ $index1 == 0 ? 'active' : '' }}" id="project_tab{{ $index1 }}">
                                                                                    {!! $datum->key !!}
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>

                                                                    <div class="content_wrapper">
                                                                        @foreach($data as $index2 => $datum)
                                                                            <div class="tab_content {{ $index2 == 0 ? 'active' : '' }}">
                                                                                {!! $datum->value !!}
                                                                            </div>
                                                                        @endforeach
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="owl-carousel">
                                                            <div class="blog-content-area" style="width: 95%; height: 300px; background-image: url({{ $post->image1 ? $post->image1 : asset('image/placeholder.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                                                            <div class="blog-content-area" style="width: 95%; height: 300px; background-image: url({{ $post->image2 ? $post->image2 : asset('image/placeholder.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                                                            <div class="blog-content-area" style="width: 95%; height: 300px; background-image: url({{ $post->image3 ? $post->image3 : asset('image/placeholder.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                                                            <div class="blog-content-area" style="width: 95%; height: 300px; background-image: url({{ $post->image4 ? $post->image4 : asset('image/placeholder.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                                                            <div class="blog-content-area" style="width: 95%; height: 300px; background-image: url({{ $post->image5 ? $post->image5 : asset('image/placeholder.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@stop

@section('style')
    <style>
        .col-md-3 {
            max-width: 21% !important;
        }
        .col-md-4 {
            max-width: 28.7% !important;
        }
    </style>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jquery.multipurpose_tabcontent.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
@stop

@section('script')
    <script src="{{ asset('js/jquery.multipurpose_tabcontent.js') }}"></script>
    <script>
        $(".demo").champ({
            plugin_type :  "tab"
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                loop:true,
                margin:10,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                },
                nav: true,
                navText: ["<i style='padding: 10px 20px; font-size: 20px; background: #efefef;' class='fa fa-angle-left'></i>", "<i style='padding: 10px 20px; font-size: 20px; background: #efefef;' class='fa fa-angle-right'></i>"]
            });
        });
    </script>
@stop

