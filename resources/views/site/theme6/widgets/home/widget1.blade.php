@php
    // models
    use App\Models\Slider;

    // sliders
    $sliders = Slider::where('status', 1)->latest()->get();
@endphp

<div class="col-md-12">
    <div style="width: 94%; margin: 0 !important;" id="sliderbox">
        <div id="slider_container_2">
            <div id="SliderName_2" class="SliderName_2">
                @foreach($sliders as $slider)
                    <img style="width: 100%;" src="{{ $slider->image ? $slider->image : asset('image/placeholder.jpg') }}"/>
                @endforeach
            </div>
            <div class="c"></div>
            <div id="SliderNameNavigation_2"></div>
            <div class="c"></div>
        </div>
    </div>
</div>
