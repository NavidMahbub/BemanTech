@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')
    <tr>
        <td colspan="2" valign="top">
            <table width="1080" border="0">
                <tr>
                    <td valign="top" width="250" ><div id="menulft" style="font-weight:bold; ">
                            <ul>
                                <li><a href="{{ route('site.portfolio.index') }}">All</a></li>
                                @foreach($list as $item)
                                    <li><a href="{{ route('site.portfolio.show', ['slug' => $item->slug]) }}">{{ substr($item->title, 0, 28) }} {{ strlen($item->title) > 28 ? '..' : '' }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </td>
                    <td valign="top" width="830" >
                        <table width="100%" border="0">
                            <tr valign="top">
                                <td style="line-height:25px; padding-left:30px"><p>
                                    <h1 style="font-size:22px; color:#66BC51;">
                                        <strong>{!! $post->title !!}</strong>
                                    </h1>
                                    <div class="bootstrap-wrapper">
                                        <div class="row" style="margin-bottom: 30px;">
                                            <div class="col-md-12">
                                                @if($post->image)
                                                    <div class="blog-content-area" style="width: 100%; height: 300px; background-image: url({{ $post->image ? $post->image : asset('image/placeholder.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                                                @endif
                                                <div class="blog-content-area mt-30">
                                                    {!! $post->body !!}
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
@stop

@section('script')
@stop
