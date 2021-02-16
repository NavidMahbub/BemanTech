@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')

<div class="mfn-main-slider" id="mfn-rev-slider">
<div id="rev_slider_1_2_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
    <div id="rev_slider_1_2" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.2.4">
        <ul>
            <li data-index="rs-1" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                <img src="{{asset('site/theme6/content2/technics/images/technology_slider.jpg')}}" alt="" title="home_technics_slider_bg" width="1920" height="788" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                <div class="tp-caption   tp-resizeme" id="slide-1-layer-2" data-x="center" data-hoffset="440" data-y="bottom" data-voffset="-7" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="y:bottom;s:300;e:Power2.easeInOut;" data-transform_out="opacity:0;s:300;" data-start="500" data-responsive_offset="on" style="z-index: 5;"><img src="{{asset('site/theme6/content2/technics/images/home_technics_slider_pic2.jpg')}}" alt="" width="1110" height="87" data-ww="1110px" data-hh="87px" data-no-retina> </div>
                <div class="tp-caption   tp-resizeme" id="slide-1-layer-1" data-x="right" data-hoffset="" data-y="bottom" data-voffset="20" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;" data-transform_out="opacity:0;s:300;" data-start="500" data-responsive_offset="on" style="z-index: 6;"><img src="{{asset('site/theme6/content2/technics/images/home_technics_slider_pic.png')}}" alt="" width="588" height="429" data-ww="588px" data-hh="429px" data-no-retina> </div>
                <div class="tp-caption mfnrs_technics_large_light   tp-resizeme" id="slide-1-layer-3" data-x="80" data-y="center" data-voffset="" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="x:50px;opacity:0;s:800;e:Power2.easeInOut;" data-transform_out="opacity:0;s:300;" data-start="500" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 7; white-space: nowrap;">
                    Technology
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
                        <div class="section mcb-section" style="padding-top:80px; padding-bottom:40px;">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one  valign-top clearfix">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_column  ">
                                            <div class="column_attr align_center">
                                                <h2>Technology We Use to Make Your Project into a Robust and Secured Entity</h2>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-fourth column_icon_box ">
                                            <div class="icon_box icon_position_top no_border">
                                                <div class="image_wrapper"><img src="{{asset('site/theme6/content2/technics/images/laravel.png')}}" class="scale-with-grid" alt="home_technics_icon1" width="53" height="53" />
                                                </div>
                                                <div class="desc_wrapper">
                                                    <h4>Laravel</h4>
                                                    <div class="desc">
                                                    The PHP Framework for Web Artisans. Laravel is a web application framework with expressive, elegant syntax.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-fourth column_icon_box ">
                                            <div class="icon_box icon_position_top no_border">
                                                <div class="image_wrapper"><img src="{{asset('site/theme6/content2/technics/images/vuejs.png')}}" class="scale-with-grid" alt="home_technics_icon2" width="53" height="53" />
                                                </div>
                                                <div class="desc_wrapper">
                                                    <h4>Vue Js</h4>
                                                    <div class="desc">
                                                    The Progressive JavaScript Framework
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-fourth column_icon_box ">
                                            <div class="icon_box icon_position_top no_border">
                                                <div class="image_wrapper"><img src="{{asset('site/theme6/content2/technics/images/nuxt.png')}}" class="scale-with-grid" alt="home_technics_icon3" width="53" height="53" />
                                                </div>
                                                <div class="desc_wrapper">
                                                    <h4>Nuxt Js</h4>
                                                    <div class="desc">
                                                    Nuxt is a server-side-rendering framework that runs on Vuejs, Expressjs, Webpack, and Babeljs.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-fourth column_icon_box ">
                                            <div class="icon_box icon_position_top no_border">
                                                <div class="image_wrapper"><img src="{{asset('site/theme6/content2/technics/images/angular.png')}}" class="scale-with-grid" alt="home_technics_icon1" width="53" height="53" />
                                                </div>
                                                <div class="desc_wrapper">
                                                    <h4>Angular Js</h4>
                                                    <div class="desc">
                                                    AngularJS is what HTML would have been, had it been designed for building web-apps. Declarative templates with data-binding,
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
                                                    <!-- <a href="#"> -->
                                                        <div class="hover_color_wrapper" style="padding:30px 30px;">
                                                            <p class="big" style="text-align: right; color: #3758ff; margin: 0;">
                                                               - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
                                                            </p>
                                                        </div>
                                                    <!-- </a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section" style="padding-top:0px; padding-bottom:40px; background-color:#e1e3e5; background-image:url({{asset('site/theme6/content2/technics/images/home_technics_sectionbg2.jpg')}}); background-repeat:no-repeat; background-position:center top;">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one-third  valign-top clearfix" style="padding:0 5% 0 0">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_placeholder">
                                            <div class="placeholder">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap two-third  valign-top clearfix" style="padding:100px 0 0 0">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_column  column-margin-20px">
                                            <div class="column_attr">
                                                <h2>Language and Framework We use 
													<br>

													</h2>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-second column_column  ">
                                            <div class="column_attr">
                                                <!-- <p>
                                                    <span class="themecolor">Lorem ipsum dolor sit amet</span>, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip dolor in reprehenderit
                                                </p>
                                                <p>
                                                    Sed ac eros ante. Pellentesque accumsan facilisis pharetra. Praesent ac mi ac eros scelerisque tempor. Nullam sem velit, tempus nec ante sit amet
                                                </p> -->
                                                <ul>
                                                    <li><h4 class="themecolor">PHP<h4></li>
                                                    <li><h4 class="themecolor">JavaScript<h4></li>
                                                    <li><h4 class="themecolor">CSS<h4></li>
                                                    <li><h4 class="themecolor">Java<h4></li>
                                                    <li><h4 class="themecolor">Boostrap<h4></li>
                                                   
            
                                                </ul>
                                               
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-second column_column  ">
                                            <div class="column_attr">
                                                <!-- <p>
                                                    Nulla rutrum sem ac neque tincidunt egestas. Nam tincidunt elementum massa, eget bibendum est feugiat vel. Interdum et malesuada fames ac ante.
                                                </p>
                                                <p>
                                                    Phasellus maximus diam at nulla tristique, vitae fringilla velit tempor. Donec est neque, faucibus in.
                                                </p> -->
                                                <ul>
                                                    <li><h4 class="themecolor">Vuejs<h4></li>
                                                    <li><h4 class="themecolor">Laravel<h4></li>
                                                    <li><h4 class="themecolor">AngularJS<h4></li>
                                                    <li><h4 class="themecolor">ReactJs<h4></li>
                                                    <li><h4 class="themecolor">NuxtJs<h4></li>
        
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="column mcb-column one column_button">
                                            <!-- <a class="button  button_right button_size_2 button_theme button_js" href="#"><span class="button_icon"><i class="icon-right-open-big" ></i></span><span class="button_label">Read more</span></a> -->
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
                                                    <a href="/contact">
                                                        <div class="hover_color_wrapper" style="padding:30px 30px;">
                                                            <p class="big" style="color: #3758ff; margin: 0; text-align: left;">
                                                                Contact Us <i class="icon-right-open-big"></i>
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
                        <div class="section mcb-section" style="padding-top:80px; padding-bottom:40px; background-color:#1b1b24; background-image:url({{asset('site/theme6/content2/technics/images/home_technics_sectionbg3.jpg')}}); background-repeat:no-repeat; background-position:center top;">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap two-third  valign-top clearfix">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_column  column-margin-20px">
                                            <div class="column_attr">
                                                <h2 style="color: #fff;">Hence We Ensure to provide You the Latest Technology</h2>
                                                <p style="color: #B7B7BB;" class="big">
                                                    Donec facilisis maximus ex, id mattis mi ultricies in. Mauris imperdiet, metus quis placerat interdum, dui nisl feugiat elit, at lobortis orci leo et cras amet. Maecenas eu fringilla urna. Ut accumsan, turpis ac porta finibus, risus odio pulvinar tortor nullam.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-second column_column  ">
                                            <div class="column_attr">
                                                <p style="color: #898991;">
                                                    <span class="themecolor">Lorem ipsum dolor sit amet, consectetur adipisicing</span> elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                                                </p>
                                                <p style="color: #898991;">
                                                    Mauris tincidunt ipsum tortor, eu accumsan turpis dictum eu. Morbi nulla turpis, euismod sed condimentum eu, lacinia eget mi. Nam lobortis ultrices justo metus.
                                                </p>
                                                <p style="color: #898991;">
                                                    Sed tortor nibh, dapibus eu justo eu, lobortis lobortis ex.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-second column_column  ">
                                            <div class="column_attr">
                                                <p style="color: #898991;">
                                                    Donec mollis, sem ut dictum bibendum, nisi justo cursus mauris, in porttitor ante ipsum et lacus. Morbi mollis mauris erat, at commodo arcu iaculis at volutpat.
                                                </p>
                                                <p style="color: #898991;">
                                                    Proin vel magna sit amet justo placerat fringilla sed at felis. Morbi dignissim quam sit amet pretium tempus. Donec eget pellentesque lacus. Vestibulum posuere.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one column_button">
                                            <a class="button  button_right button_size_2 button_theme button_js" href="#"><span class="button_icon"><i class="icon-right-open-big" ></i></span><span class="button_label">Read more</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap one-third  valign-top clearfix">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_placeholder">
                                            <div class="placeholder">
                                                &nbsp;
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
