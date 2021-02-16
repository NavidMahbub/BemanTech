@php
    // models
    use App\Models\Slider;

    // sliders
    $sliders = Slider::where('status', 1)->latest()->get();
@endphp

{{--Sliders--}}
<div class="content_fullwidth">
    <div class="container">
        <div class="fullwidthbanner-container">
            <div class="fullwidthbanner">
                <ul>
                    @foreach($sliders as $slider)
                        <li data-transition="fade" data-slotamount="9" data-thumb="{{ $slider->image }}">
                            <img src="{{ $slider->image ? $slider->image : asset('image/placeholder.jpg') }}" alt="{{ $slider->title }}" style="width: 1170px; height: 375px;">
                            <div class="caption lft large_text_two" data-x="10" data-y="349" data-speed="900" data-start="1300" data-easing="easeOutExpo">{{ $slider->title }}</div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="waves_01"></div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

