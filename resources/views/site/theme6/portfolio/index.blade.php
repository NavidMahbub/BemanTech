
@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')


<div class="mfn-main-slider" id="mfn-rev-slider">
                    <div id="rev_slider_1_2_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                        <div id="rev_slider_1_2" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.2.4">
                            <ul>
                                <li data-index="rs-1" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <img src="{{asset('site/theme6/content2/technics/images/home_technics_subheader12.jpg')}}" alt="" title="home_technics_slider_bg" width="1920" height="788" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                    <div class="tp-caption   tp-resizeme" id="slide-1-layer-2" data-x="center" data-hoffset="440" data-y="bottom" data-voffset="-7" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="y:bottom;s:300;e:Power2.easeInOut;" data-transform_out="opacity:0;s:300;" data-start="500" data-responsive_offset="on" style="z-index: 5;"><img src="{{asset('site/theme6/content2/technics/images/home_technics_slider_pic2.jpg')}}" alt="" width="1110" height="87" data-ww="1110px" data-hh="87px" data-no-retina> </div>
                                    <div class="tp-caption   tp-resizeme" id="slide-1-layer-1" data-x="right" data-hoffset="" data-y="bottom" data-voffset="20" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;" data-transform_out="opacity:0;s:300;" data-start="500" data-responsive_offset="on" style="z-index: 6;"><img src="{{asset('site/theme6/content2/technics/images/home_technics_slider_pic.png')}}" alt="" width="588" height="429" data-ww="588px" data-hh="429px" data-no-retina> </div>
                                    <div class="tp-caption mfnrs_technics_large_light   tp-resizeme" id="slide-1-layer-3" data-x="80" data-y="center" data-voffset="" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="x:50px;opacity:0;s:800;e:Power2.easeInOut;" data-transform_out="opacity:0;s:300;" data-start="500" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 7; white-space: nowrap;">
                                       Portfolio
                                        <br>
                                        <br>  </div>
                                    <a class="tp-caption mfnrs_technics_small_light   tp-resizeme" href="/company" target="_self" id="slide-1-layer-4" data-x="80" data-y="bottom" data-voffset="37" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="opacity:0;s:800;e:Power2.easeInOut;" data-transform_out="opacity:0;s:300;" data-start="500" data-splitin="none" data-splitout="none" data-actions='' data-responsive_offset="on" style="z-index: 8; white-space: nowrap;">Read more about the company <i class="icon-right-open-big"></i> </a> </li>
                            </ul>
                            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                        </div>
                    </div>
                </div>



                <div id="Content">
            <div class="content_wrapper clearfix">
                <div class="sections_group">
                    <div class="entry-content">
                            @php $i=1; @endphp
                    @foreach($list as $item)
                        
                        @if($i==1)
                        <div class="section mcb-section" style="padding-top:80px; padding-bottom:0px;">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one-second  valign-top clearfix">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_image ">
                                            <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                                                <div class="image_wrapper"><img class="scale-with-grid" src="{{ $item->image ? $item->image : asset('image/placeholder.jpg') }}" alt="home_technics_machine2" width="780" height="551" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap one-second  valign-top clearfix" style="padding:20px 0 0 2%">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_column  column-margin-20px">
                                            <div class="column_attr">
                                                <h3><span class="themecolor">{{ $item->title }}</span></h3>

                                                <br>
                                                <br>
                                                <p style="color: #768186;">

                                                {{ $item->body }}
                                               
                                                </p>
                                            </div>

                                            <!-- <b>Things we have Discussed for this Projects</b> -->
                                        </div>
                                        <div class="column mcb-column one-second column_column  ">
                                            <div class="column_attr" style=" background-image:url({{asset('site/theme6/content2/technics/images/home_technics_sep3.png')}}); background-repeat:no-repeat; background-position:left top; padding:0 0 0 30px;">
                                                                                       </div>
                                        </div>
                                        <div class="column mcb-column one-second column_column  ">
                                            <div class="column_attr" style=" background-image:url({{asset('site/theme6/content2/technics/images/home_technics_sep3.png')}}); background-repeat:no-repeat; background-position:left top; padding:0 0 0 30px;">
                                            </div>
                                        </div>
                                        <!-- <div class="column mcb-column one column_column  ">
                                            <div class="column_attr">
                                                <div style=" padding: 15px;">
                                                <a href="{{ route('site.project.show', ['slug' => $item->slug]) }}">Go For Details</a>                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap one  valign-top clearfix">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_divider ">
                                            <hr class="no_line" style="margin: 0 auto 30px;" />
                                        </div>
                                        <div class="column mcb-column one column_divider ">
                                            <hr class="hr_color" style="margin: 0 auto 70px;" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php $i=2; @endphp
                        @elseif($i==2)
                        <div class="section mcb-section" style="padding-top:0px; padding-bottom:0px;">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one-second  valign-top clearfix" style="padding:20px 2% 0 0">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_column  column-margin-20px">
                                            <div class="column_attr">
                                                <h3><span class="themecolor">{{ $item->title }}</span></h3>
                                                <br>
                                                <br>
                                                <p style="color: #768186;">
                                                {{ $item->body }}
                                                </p>
                                            </div>
                                            <!-- <b>Things we have Discussed for this Projects</b> -->
                                        </div>
                                        <div class="column mcb-column one-second column_column  ">
                                            <div class="column_attr" style=" background-image:url({{asset('site/theme6/content2/technics/images/home_technics_sep3.png')}}); background-repeat:no-repeat; background-position:left top; padding:0 0 0 30px;">
                                          
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-second column_column  ">
                                            <div class="column_attr" style=" background-image:url({{asset('site/theme6/content2/technics/images/home_technics_sep3.png')}}); background-repeat:no-repeat; background-position:left top; padding:0 0 0 30px;">
                                           
                                            </div>
                                        </div>
                                        <!-- <div class="column mcb-column one column_column  ">
                                            <div class="column_attr" style="  padding:15px;">
                                               <a href="{{ route('site.project.show', ['slug' => $item->slug]) }}">Go For Details</a>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap one-second  valign-top clearfix">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_image ">
                                            <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                                                <div class="image_wrapper"><img class="scale-with-grid" src="{{ $item->image ? $item->image : asset('image/placeholder.jpg') }}" alt="home_technics_machine2" width="780" height="551" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap one  valign-top clearfix">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_divider ">
                                            <hr class="no_line" style="margin: 0 auto 30px;" />
                                        </div>
                                        <div class="column mcb-column one column_divider ">
                                            <hr class="hr_color" style="margin: 0 auto 70px;" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php $i=1; @endphp
                        @endif
                    @endforeach
                        <div class="section mcb-section full-width no-margin-h no-margin-v  " style="padding-top:0px; padding-bottom:0px; background-color:#3758ff">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one  valign-top clearfix">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column two-third column_placeholder">
                                            <div class="placeholder">
                                                &nbsp;
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-third column_hover_color ">
                                            <div class="hover_color" style="background:#fff" ontouchstart="this.classList.toggle('hover');">
                                                <div class="hover_color_bg" style="background:#f9f9f9;">
                                                    <a href="/contact">
                                                        <div class="hover_color_wrapper" style="padding:30px 30px;">
                                                            <p class="big" style="color: #3758ff; margin: 0; text-align: left;">
                                                                Contact us <i class="icon-right-open-big"></i>
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

@stop

@section('style')
@stop

@section('script')
@stop

