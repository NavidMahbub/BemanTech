@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')
    <tr>
        <td colspan="2" valign="top">
            <table width="1080" border="0">
                <tr>
                    <td valign="top" width="250" ><div id="menulft" style="font-weight:bold; ">
                            <ul>
                                <li><a href="{{ route('site.project.index') }}">All</a></li>
                                @foreach($categories as $category)
                                    <li><a href="{{ route('site.project.index', ['category_id' => $category->id]) }}">{{ substr($category->title, 0, 28) }} {{ strlen($category->title) > 28 ? '..' : '' }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </td>
                    <td valign="top" width="830" >
                        <table width="100%" border="0">
                            <tr valign="top">
                                <td style="line-height:25px; padding-left:30px"><p>
                                    <h1 style="font-size:22px; color:#66BC51;">
                                        <strong>Project</strong>
                                    </h1>
                                    <div class="bootstrap-wrapper">
                                        <div class="row" style="margin-bottom: 30px;">
                                            @foreach($list as $item)
                                            <div class="col-md-4" style="margin-bottom: 30px;">
                                                <a href="{{ route('site.project.show', ['slug' => $item->slug]) }}">
                                                    <div class="grid-card">
                                                        <img src="{{ $item->image ? $item->image : asset('image/placeholder.jpg') }}" alt="{{ $item->title }}" style="width:100%">
                                                        <div class="grid-card-text">
                                                            <h1 style="font-size:15px; color:#66BC51;padding: 15px; margin-top: -5px;">
                                                                {{ $item->title }}
                                                            </h1>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="row" style="margin-bottom: 30px; margin-top: -30px;">
                                            <div class="col-md-12">
                                                {!! $list->links() !!}
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