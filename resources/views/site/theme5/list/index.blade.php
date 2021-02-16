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
                                    <h1 style="font-size:22px; color:#66BC51;"><strong>{!! $category->title !!}</strong></h1>
                                    <div class="bootstrap-wrapper">
                                        <div class="row" style="margin-bottom: 30px;">
                                            @foreach($list as $item)
                                                <div class="col-md-12" style="margin-bottom: 20px">
                                                    <div class="grid-card">
                                                        <div class="grid-card-container">
                                                            <a href="{{ route('site.item.post.show', ['category_slug' => $category->slug, 'post_slug' => $item->slug]) }}" style="color: #2b2b36; text-decoration: none;"><h1 style="font-size:20px; color:#2b2b36;">{{ $item->title }}</h1></a>
                                                            <p>Posted by <span style="color:#66BC51;">Admin</span>, Posted At: <span style="color:#66BC51;">{{ $item->created_at->diffForHumans() }}</span></p>
                                                            <p>{!! substr($item->body, 0, 250) !!}</p>
                                                            <a href="{{ route('site.item.post.show', ['category_slug' => $category->slug, 'post_slug' => $item->slug]) }}" class="g-btn-link" style="margin-bottom: 20px;">Read more</a>
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
@stop

@section('script')
@stop
