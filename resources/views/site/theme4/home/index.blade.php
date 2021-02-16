@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')
    <tr style="margin-top: 20px !important;">
        <td colspan="2" valign="top">
            <table width="1080" border="0">
                <tr>
                    <td valign="top" width="250" >
                        <div id="rightSidebar">
                            <div class="widgetArea">
                                <div class="widgetArea">
                                    <div class="widgetTitle"><span></span>
                                        <h3>About Company</h3>
                                    </div>
                                    <div class="widgetBlock">
                                        @php
                                            // models
                                            use App\Models\ContentPost;

                                            // content data
                                            $post = ContentPost::where('slug', 'company-profile')->first()
                                        @endphp

                                        {!! substr($post->body, 0, 200) !!} <a href="{{ route('site.content.post.show', ['category_slug' => 'home', 'post_slug' => 'company-profile']) }}">more</a>
                                    </div>
                                </div>
                                <div class="widgetArea">
                                    <div class="widgetTitle"><span></span>
                                        <h3>News</h3>
                                    </div>
                                    <div class="widgetBlock">
                                        @php
                                            // models
                                            use App\Models\ItemPost;
                                            use App\Models\ItemCategory;

                                            // service category
                                            $category = ItemCategory::where('slug', 'news')->first();

                                            // services
                                            $items = ItemPost::where('item_category_id', $category->id)->get()->take(3);
                                        @endphp

                                        @foreach($items as $item)
                                            <div class="fb-like-box">
                                                <a style="text-decoration: none; color: #0b0b0b; padding: 5px; display: inline-block;" href="{{ route('site.item.post.show', ['category_slug' => $category->slug, 'post_slug' => $item->slug]) }}">{{ substr($item->title, 0, 40) }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="widgetArea">
                                    <div class="widgetTitle"><span></span>
                                        <h3>Follow Us</h3>
                                    </div>
                                    <div class="widgetBlock">
                                        <a href="{{ $setting_contact->facebook }}" target="_blank">
                                            <img src="{{ asset('site/theme4/images/fb_sq.png') }}" width="63" height="59" border="0" />
                                        </a>
                                        <a href="{{ $setting_contact->linkedin }}" target="_blank">
                                            <img src="{{ asset('site/theme4/images/ln.png') }}" width="63" height="59" border="0" />
                                        </a>
                                        <a href="{{ $setting_contact->youtube }}" target="_blank">
                                            <img src="{{ asset('site/theme4/images/youtube.png') }}" width="63" height="59" border="0" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td valign="top" width="830" >
                        <table width="100%" border="0">
                            <tr valign="top">
                                <td>
                                    <div class="bootstrap-wrapper">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @include('site.theme4.widgets.home.widget1')
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr valign="top">
                                <td>
                                    <table width="100%" border="0">
                                        <tr>
                                            <td colspan="4">
                                                <div id= "scrollbox">
                                                    @php
                                                        $projects = \App\Models\ProjectPost::where('status', 1)->latest()->get()->take(15);
                                                    @endphp
                                                    <ul id="scroller" style="background-image:none;">
                                                        @foreach($projects as $project)
                                                            <li>
                                                                <a href="{{ route('site.project.show', ['slug' => $project->slug]) }}">
                                                                    <img src="{{ $item->image ? $item->image : asset('image/placeholder.jpg') }}" style="height: 145px; width: 180px;" border="0" class="widgetBlockIndex">
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <br />
                                            </td>
                                        </tr>
                                        <tr>
                                            @php
                                                $categories = \App\Models\ProjectCategory::where('status', 1)->latest()->get()->take(4);
                                            @endphp
                                            @foreach($categories as $category)
                                                <td align="center">
                                                    <a href="{{ route('site.project.index', ['category_id' => $category->id]) }}">
                                                        <img style="width: 150px;" src="{{ $category->image ? $category->image : asset('image/placeholder.jpg') }}" border="0" class="widgetBlockIndex" />
                                                    </a>
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td colspan="4"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <style type="text/css">
        <!--
        .style1 {font-weight: bold}
        -->
    </style>
@stop

@section('style')
    <style>
        .col-md-3 {
            max-width: 22% !important;
        }
        .col-md-4 {
            max-width: 29.7% !important;
        }
        .SliderName_2 {
            width: 770px !important;
        }
        h1, h2, h3, h4, h5, h6 {
            color: #66bc51;
        }
    </style>
@stop

@section('script')
    <script type="text/javascript">
        effectsDemo2 = 'blinds';
        var demoSlider_2 = Sliderman.slider({container: 'SliderName_2', width: 770, height: 393, effects: effectsDemo2,
            display: {
                autoplay: 3000,
                loading: {background: '#000000', opacity: 0.5, image: 'images/loading.gif'},
                buttons: {hide: true, opacity: 1, prev: {className: 'SliderNamePrev_2', label: ''}, next: {className: 'SliderNameNext_2', label: ''}},
                description: {hide: true, background: '#000000', opacity: 0.4, height: 50, position: 'bottom'},
                navigation: {container: 'SliderNameNavigation_2', label: '<img src="images/clear.gif" />'}
            }
        });
    </script>
@stop
