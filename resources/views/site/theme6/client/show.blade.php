@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')
    

<div class="mfn-main-slider" id="mfn-rev-slider">
    <div id="rev_slider_1_2_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
        <div id="rev_slider_1_2" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.2.4">
            <ul>
                <li data-index="rs-1" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <img src="{{asset('site/theme6/content2/technics/images/contacts_slider.jpg')}}" alt="" title="home_technics_slider_bg" width="1920" height="788" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    <div class="tp-caption   tp-resizeme" id="slide-1-layer-2" data-x="center" data-hoffset="440" data-y="bottom" data-voffset="-7" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="y:bottom;s:300;e:Power2.easeInOut;" data-transform_out="opacity:0;s:300;" data-start="500" data-responsive_offset="on" style="z-index: 5;"><img src="{{asset('site/theme6/content2/technics/images/home_technics_slider_pic2.jpg')}}" alt="" width="1110" height="87" data-ww="1110px" data-hh="87px" data-no-retina> </div>
                    <div class="tp-caption   tp-resizeme" id="slide-1-layer-1" data-x="right" data-hoffset="" data-y="bottom" data-voffset="20" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;" data-transform_out="opacity:0;s:300;" data-start="500" data-responsive_offset="on" style="z-index: 6;"><img src="{{asset('site/theme6/content2/technics/images/home_technics_slider_pic.png')}}" alt="" width="588" height="429" data-ww="588px" data-hh="429px" data-no-retina> </div>
                    <div class="tp-caption mfnrs_technics_large_light   tp-resizeme" id="slide-1-layer-3" data-x="80" data-y="center" data-voffset="" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="x:50px;opacity:0;s:800;e:Power2.easeInOut;" data-transform_out="opacity:0;s:300;" data-start="500" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 7; white-space: nowrap;">
                    <br><br><br> Client Details
                        
                        </div>
                    <a class="tp-caption mfnrs_technics_small_light   tp-resizeme" href="/company" target="_self" id="slide-1-layer-4" data-x="80" data-y="bottom" data-voffset="37" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="opacity:0;s:800;e:Power2.easeInOut;" data-transform_out="opacity:0;s:300;" data-start="500" data-splitin="none" data-splitout="none" data-actions='' data-responsive_offset="on" style="z-index: 8; white-space: nowrap;">Read more about the company <i class="icon-right-open-big"></i> </a> </li>
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div>
    </div>





    <div style="background-color:#1b1b24;height:600px">
                
                <br>
                <br><br>
                <br><br>
                <br>
                <div class="row" style="margin-left:200px">

                            <div  class="col-md-6"><img style="height:250px;width:299px" src="{{ $client_one->logo ? $client_one->logo :  asset('site/theme6/content2/technics/images/home_technics_machine5.jpg')}}"/></div>
                            <div class="col-md-6">
                                <div>
                                <h3 style="text-align:left"><span class="themecolor"><b>{{$client_one->name}}</b></span></h3>
                                </div>
                                <div>
                                    <p style="text-align:left;color:white">{{strip_tags($client_one->about)}}</p>
                                </div>
                                <div style="margin-top:50px">
                                    <p>Visit Website : <a href="{{$client_one->website}}"  target="_blank">{{$client_one->website}}</a></p>
                                </div>

                            </div>

                </div>
                <br>
            </div>
                        




    @stop