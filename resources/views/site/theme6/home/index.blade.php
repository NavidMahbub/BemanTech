@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')

@php
$project1 = \App\Models\ProjectPost::where('slug', 'das')->first();
$project2 = \App\Models\ProjectPost::where('slug', 'das')->first();
$project3 = \App\Models\ProjectPost::where('slug', 'das')->first();
$project4 = \App\Models\ProjectPost::where('slug', 'das')->first();
$project5 = \App\Models\ProjectPost::where('slug', 'das')->first();
$clients = \App\Models\Client::where('status', 1)->paginate(8);

@endphp

    <div class="mfn-main-slider" id="mfn-rev-slider">
        <div id="rev_slider_1_2_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
            <div id="rev_slider_1_2" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.2.4">
                <ul>
                    <li data-index="rs-1" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <img src="{{asset('site/theme6/content2/technics/images/home_technics_slider_bg.jpg')}}" alt="" title="home_technics_slider_bg" width="1920" height="788" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <div class="tp-caption   tp-resizeme" id="slide-1-layer-2" data-x="center" data-hoffset="440" data-y="bottom" data-voffset="-7" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="y:bottom;s:300;e:Power2.easeInOut;" data-transform_out="opacity:0;s:300;" data-start="500" data-responsive_offset="on" style="z-index: 5;"><img src="{{asset('site/theme6/content2/technics/images/home_technics_slider_pic2.jpg')}}" alt="" width="1110" height="87" data-ww="1110px" data-hh="87px" data-no-retina> </div>
                        <div class="tp-caption   tp-resizeme" id="slide-1-layer-1" data-x="right" data-hoffset="" data-y="bottom" data-voffset="20" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;" data-transform_out="opacity:0;s:300;" data-start="500" data-responsive_offset="on" style="z-index: 6;"><img src="{{asset('site/theme6/content2/technics/images/home_technics_slider_pic.png')}}" alt="" width="588" height="429" data-ww="588px" data-hh="429px" data-no-retina> </div>
                        <div class="tp-caption mfnrs_technics_large_light   tp-resizeme" id="slide-1-layer-3" data-x="80" data-y="center" data-voffset="" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="x:50px;opacity:0;s:800;e:Power2.easeInOut;" data-transform_out="opacity:0;s:300;" data-start="500" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 7; white-space: nowrap;">
                            Home Of <span class="">Tech</span>
                            </div>
                        <a class="tp-caption mfnrs_technics_small_light   tp-resizeme" href="/company" target="_self" id="slide-1-layer-4" data-x="80" data-y="bottom" data-voffset="37" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="opacity:0;s:800;e:Power2.easeInOut;" data-transform_out="opacity:0;s:300;" data-start="500" data-splitin="none" data-splitout="none" data-actions='' data-responsive_offset="on" style="z-index: 8; white-space: nowrap;">Read more about the company <i class="icon-right-open-big"></i> </a> </li>
                </ul>
                <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
            </div>
        </div>
    </div>

    <div >
        <div id="Content">
            <div class="content_wrapper clearfix">
                <div class="sections_group">
                    <div class="entry-content" itemprop="mainContentOfPage">
                        <div class="section mcb-section" style="padding-top:50px; padding-bottom:100px;">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one  valign-top clearfix">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_image ">
                                            <div class="image_frame image_item no_link scale-with-grid no_border">
                                                <div class="image_wrapper"><img class="scale-with-grid" src="{{asset('site/theme6/content2/technics/images/home_technics_sep.png')}}" alt="home_technics_sep" width="2" height="52" /> </div>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one column_column  column-margin-20px">
                                            <div class="column_attr">
                                                <h2>Our  <span class="themecolor">Projects</span></h2>
                                            </div>

                                            
                                        </div>
                                        <div class="column mcb-column one-second column_column  ">
                                            <div class="column_attr">
                                                <p>
                                                    <b>We Believe In Work & Commitment</b>. Give us an Idea, We will Provide You a Smart Solution .
                                                </p>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-second column_column  ">
                                            <div class="column_attr">
                                                <p>
                                                <b>We Believe In Work & Commitment</b>. Give us an Idea, We will Provide You a Smart Solution .
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap one-second  column-margin-0px valign-top clearfix" style="padding:0 1%">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_image ">
                                            <div class="image_frame image_item scale-with-grid no_border">
                                                <div class="image_wrapper">
                                                    <a href="{{ route('site.project.show', ['slug' => $project1->slug]) }}">
                                                        <div class="mask"></div><img class="scale-with-grid" src="{{$project1->image1 ? $project1->image1 : asset('site/theme6/content2/technics/images/home_technics_machine1.jpg')}}" alt="home_technics_machine1" width="780" height="626" />
                                                    </a>
                                                    <div class="image_links ">
                                                        <a href="{{ route('site.project.show', ['slug' => $project1->slug]) }}" class="link"><i class="icon-link"></i></a> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one column_column  ">
                                            <div class="column_attr" style=" background-color:#fff; padding:15px; border: 1px solid #ededed;">
                                                <h5 style="margin: 0;">{{$project1->title}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap one-fourth  column-margin-0px valign-top clearfix" style="padding:0 1%">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_image ">
                                            <div class="image_frame image_item scale-with-grid no_border">
                                                <div class="image_wrapper">
                                                    <a href="{{ route('site.project.show', ['slug' => $project2->slug]) }}">
                                                        <div class="mask"></div><img class="scale-with-grid" src="{{$project2->image1 ?$project2->image1 : asset('site/theme6/content2/technics/images/home_technics_machine2.jpg')}}" alt="home_technics_machine2" width="780" height="551" />
                                                    </a>
                                                    <div class="image_links ">
                                                        <a href="{{ route('site.project.show', ['slug' => $project2->slug]) }}" class="link"><i class="icon-link"></i></a> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one column_column  ">
                                            <div class="column_attr" style=" background-color:#fff; padding:15px; border: 1px solid #ededed;">
                                                <h5 style="margin: 0;">{{$project2->title}}</h5>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one column_divider ">
                                            <hr class="no_line" style="margin: 0 auto 25px;" />
                                        </div>
                                        <div class="column mcb-column one column_image ">
                                            <div class="image_frame image_item scale-with-grid no_border">
                                                <div class="image_wrapper">
                                                    <a href="{{ route('site.project.show', ['slug' => $project3->slug]) }}">
                                                        <div class="mask"></div><img class="scale-with-grid" src="{{$project3->image1 ?$project3->image1 : asset('site/theme6/content2/technics/images/home_technics_machine4.jpg')}}" alt="home_technics_machine4" width="780" height="551" />
                                                    </a>
                                                    <div class="image_links ">
                                                        <a href="{{ route('site.project.show', ['slug' => $project3->slug]) }}" class="link"><i class="icon-link"></i></a> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one column_column  ">
                                            <div class="column_attr" style=" background-color:#fff; padding:15px; border: 1px solid #ededed;">
                                                <h5 style="margin: 0;"> {{$project3->title}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap one-fourth  column-margin-0px valign-top clearfix" style="padding:0 1%">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_image ">
                                            <div class="image_frame image_item scale-with-grid no_border">
                                                <div class="image_wrapper">
                                                    <a href="{{ route('site.project.show', ['slug' => $project4->slug]) }}">
                                                        <div class="mask"></div><img class="scale-with-grid" src="{{$project4->image1 ?$project4->image1 : asset('site/theme6/content2/technics/images/home_technics_machine3.jpg')}}" alt="home_technics_machine3" width="780" height="551" />
                                                    </a>
                                                    <div class="image_links ">
                                                        <a href="{{ route('site.project.show', ['slug' => $project4->slug]) }}" class="link"><i class="icon-link"></i></a> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one column_column  ">
                                            <div class="column_attr" style=" background-color:#fff; padding:15px; border: 1px solid #ededed;">
                                                <h5 style="margin: 0;"> {{$project4->title}}</h5>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one column_divider ">
                                            <hr class="no_line" style="margin: 0 auto 25px;" />
                                        </div>
                                        <div class="column mcb-column one column_image ">
                                            <div class="image_frame image_item scale-with-grid no_border">
                                                <div class="image_wrapper">
                                                    <a href="{{ route('site.project.show', ['slug' => $project5->slug]) }}">
                                                        <div class="mask"></div><img class="scale-with-grid" src="{{ $project5->image1 ? $project5->image1 : asset('site/theme6/content2/technics/images/home_technics_machine5.jpg') }}" alt="home_technics_machine5" width="780" height="551" />
                                                    </a>
                                                    <div class="image_links ">
                                                        <a href="{{ route('site.project.show', ['slug' => $project5->slug]) }}" class="link"><i class="icon-link"></i></a> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one column_column  ">
                                            <div class="column_attr" style=" background-color:#fff; padding:15px; border: 1px solid #ededed;">
                                                <h5 style="margin: 0;">{{$project5->title}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section full-width no-margin-h no-margin-v" style="padding-top:0px; padding-bottom:0px; background-color:#e1e3e5">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one  valign-top clearfix">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column two-third column_hover_color ">
                                            <div class="hover_color" style="background:#fff" ontouchstart="this.classList.toggle('hover');">
                                                <div class="hover_color_bg" style="background:#f9f9f9;">
                                                    <a href="/project">
                                                        <div class="hover_color_wrapper" style="padding:30px 30px;">
                                                            <p class="big" style="text-align: right; color: #3758ff; margin: 0;">
                                                                View all Projects <i class="icon-right-open-big"></i>
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section" style="padding-top:0px; padding-bottom:40px; background-color:#e1e3e5; background-image:url({{asset('site/theme6/content2/technics/images/home_technics_sectionbg1.png')}}); background-repeat:no-repeat; background-position:center top;">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one-second  valign-top clearfix" style="padding:0 5% 0 0">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column five-sixth column_placeholder">
                                            <div class="placeholder">
                                                &nbsp;
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-sixth column_image ">
                                            <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                                                <div class="image_wrapper"><img class="scale-with-grid" src="{{asset('site/theme6/content2/technics/images/home_technics_sep2.png')}}" alt="home_technics_sep2" width="2" height="262" /> </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap one-second  valign-top clearfix" style="padding:100px 0 0 0">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_column  ">
                                            <div class="column_attr">
                                                <h2>Technology</h2>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-second column_column  ">
                                            <div class="column_attr" style=" padding:0 5% 0 0;">
                                                <div class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                                    <div class="image_wrapper"><img class="scale-with-grid" src="{{asset('site/theme6/content2/technics/images/laravel.png')}}" alt="home_technics_icon1" width="53" height="53" /> </div>
                                                </div>
                                                <hr class="no_line" style="margin: 0 auto 20px;" />
                                                <p>
                                                   
                                                    <b>The PHP Framework</b> for Web Artisans. Laravel is a web application framework with expressive, elegant syntax.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-second column_column  ">
                                            <div class="column_attr" style=" padding:0 5% 0 0;">
                                                <div class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                                    <div class="image_wrapper"><img class="scale-with-grid" src="{{asset('site/theme6/content2/technics/images/vuejs.png')}}" alt="home_technics_icon2" width="53" height="53" /> </div>
                                                </div>
                                                <hr class="no_line" style="margin: 0 auto 20px;" />
                                                <p>
                                                <b>The Progressive JavaScript Framework</b> Declarative templates with data-binding,</p>                                                </p>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one column_divider ">
                                            <hr class="no_line" />
                                        </div>
                                        <div class="column mcb-column one-second column_column  ">
                                            <div class="column_attr" style=" padding:0 5% 0 0;">
                                                <div class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                                    <div class="image_wrapper"><img class="scale-with-grid" src="{{asset('site/theme6/content2/technics/images/nuxt.png')}}" alt="home_technics_icon3" width="53" height="53" /> </div>
                                                </div>
                                                <hr class="no_line" style="margin: 0 auto 20px;" />
                                                <p>
                                                    <b> Nuxt is a server-side-rendering framework</b> that runs on Vuejs, Expressjs, Webpack, and Babeljs.

                                                </p>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-second column_column  ">
                                            <div class="column_attr" style=" padding:0 5% 0 0;">
                                                <div class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                                    <div class="image_wrapper"><img class="scale-with-grid" src="{{asset('site/theme6/content2/technics/images/angular.png')}}" alt="home_technics_icon4" width="53" height="53" /> </div>
                                                </div>
                                                <hr class="no_line" style="margin: 0 auto 20px;" />
                                                <p>
                                                    <b>AngularJS is what HTML </b>would have been, had it been designed for building web-apps.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section full-width no-margin-h no-margin-v  " style="padding-top:0px; padding-bottom:0px; background-color:#1b1b24">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one  valign-top clearfix">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one-third column_placeholder">
                                            <div class="placeholder">
                                                &nbsp;
                                            </div>
                                        </div>
                                        <div class="column mcb-column two-third column_hover_color ">
                                            <div class="hover_color" style="background:#fff" ontouchstart="this.classList.toggle('hover');">
                                                <div class="hover_color_bg" style="background:#e1e3e5;">
                                                    <a href="/technology">
                                                        <div class="hover_color_wrapper" style="padding:30px 30px;">
                                                            <p class="big" style="color: #3758ff; margin: 0; text-align: left;">
                                                                Read about technology <i class="icon-right-open-big"></i>
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="background-color:#1b1b24;height:600px">
                            
                            <div>
                                <h2  style="margin-left:55px;color:white">Our <span class="themecolor"> Clients</span></h2>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="row" >


                                @foreach($clients as $key => $client)
                                    
                                    <div class="col-md-2 " style="margin-left:88px">
                                        <div><a href="{{ route('site.client.show', ['id' => $client->id]) }}"><img style="height:150px;width:199px" src="{{ $client->logo ? $client->logo :  asset('site/theme6/content2/technics/images/home_technics_machine5.jpg')}}"/></a></div>
                                    <div><p style="text-align:center;color:white">{{$client->name}}</p></div>
                                </div>
                                @endforeach

                                
                            </div>
                            <br><br>
                            <div style="text-align:center">
                             <a class="button  button_right button_size_2 button_theme button_js" href="/client" ><span class="button_icon"><i class="icon-right-open-big" ></i></span><span class="button_label">Read more</span></a>
                            </div>
                        </div>



                        <!-- services -->
                        <div class="section mcb-section" style="padding-top:80px; padding-bottom:40px;">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one  valign-top clearfix">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_column  ">
                                            <div class="column_attr align_center">
                                                <h2>Our <span class="themecolor">Services<span></h2>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-fourth column_icon_box ">
                                            <div class="icon_box icon_position_top no_border">
                                                <br>
                                            <div class="image_wrapper"><img src="{{asset('site/theme6/content2/technics/images/webdevelopment.png')}}" class="scale-with-grid" alt="home_technics_icon2" width="53" height="53" />
                                                </div>
                                                <div class="desc_wrapper">
                                                    <h4>Web Development</h4>
                                                    <div class="desc">
                                                         Our expert team of Website Developers & Digital Strategists use cutting edge technology
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-fourth column_icon_box ">
                                            <div class="icon_box icon_position_top no_border">
                                                <div class="image_wrapper"><img src="{{asset('site/theme6/content2/technics/images/ios.png')}}" class="scale-with-grid" alt="home_technics_icon2" width="53" height="53" />
                                                </div>
                                                <div class="desc_wrapper">
                                                    <h4>iOS</h4>
                                                    <div class="desc">
                                                        Everything about iOS is designed with premium interface including the iPhone, and iPod Touch
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-fourth column_icon_box ">
                                            <div class="icon_box icon_position_top no_border">
                                            <div class="image_wrapper"><img src="{{asset('site/theme6/content2/technics/images/android.png')}}" class="scale-with-grid" alt="home_technics_icon2" width="53" height="53" />
                                                </div>
                                                <div class="desc_wrapper">
                                                    <h4>Android</h4>
                                                    <div class="desc">
                                                        We develop various apps in the latest and greatest on the world's most powerful mobile platform
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-fourth column_icon_box ">
                                            <div class="icon_box icon_position_top no_border">
                                            <div class="image_wrapper"><img src="{{asset('site/theme6/content2/technics/images/logo_design.png')}}" class="scale-with-grid" alt="home_technics_icon2" width="53" height="53" />
                                                </div>
                                                <div class="desc_wrapper">
                                                    <h4>Logo Design</h4>
                                                    <div class="desc">
                                                    Create & design your logo using logo maker tools choosing from hundreds of fonts and icons
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section full-width no-margin-h no-margin-v  " style="padding-top:0px; padding-bottom:0px; background-color:#e1e3e5">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one  valign-top clearfix">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column two-third column_hover_color ">
                                            <div class="hover_color" style="background:#fff" ontouchstart="this.classList.toggle('hover');">
                                                <div class="hover_color_bg" style="background:#f9f9f9;">
                                                    <a href="/service">
                                                        <div class="hover_color_wrapper" style="padding:30px 30px;">
                                                            <p class="big" style="text-align: right; color: #3758ff; margin: 0;">
                                                                Read more <i class="icon-right-open-big"></i>
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                 <div class="section the_content no_content">
                            <div class="section_wrapper">
                                <div class="the_content_wrapper"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

   
@stop

@section('style')

@stop

@section('script')
@stop
