@php
    // models
    use App\Models\Slider;

    // sliders
    $sliders = Slider::where('status', 1)->latest()->get();
@endphp

<div class="slider-area">
    <div class="slider-active owl-carousel">
        @foreach($sliders as $slider)
            <div class="single-slider ptb-150 bg-opacity" style="background-image:url({{ $slider->image ? $slider->image : asset('image/placeholder.jpg') }});height: 500px;background-position: center;background-repeat: no-repeat;background-size: cover;">
                <div class="container">
                    <div class="slider-text">
                        <h1>{{ $slider->title }}</h1>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
