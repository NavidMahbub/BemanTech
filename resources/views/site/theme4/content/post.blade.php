@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')
    <tr>
        <td colspan="2" valign="top">
            <table width="1080" border="0">
                <tr>
                    <td valign="top" width="1080" >
                        <table width="100%" border="0">
                            <tr valign="top">
                                <td style="line-height:25px; padding-left:30px"><p>
                                    <h1 style="font-size:22px; color:#66BC51;"><strong>{!! $post->title !!}</strong></h1>
                                    @if($post->image)
                                        <div class="blog-content-area" style="width: 100%; height: 300px; background-image: url({{ $post->image ? $post->image : asset('image/placeholder.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                                    @endif
                                    <p>
                                        {!! $post->body !!}
                                    </p>
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
    {{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-v4-grid-only@1.0.0/dist/bootstrap-grid.min.css">--}}
@stop

@section('script')
@stop
