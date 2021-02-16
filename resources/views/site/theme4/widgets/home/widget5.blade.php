@php
    // models
    use App\Models\ProjectPost;
    use App\Models\ProjectCategory;

    // service category
    $category = ProjectCategory::where('slug', 'upcoming-projects')->first();

    // services
    $items = ProjectPost::where('project_category_id', $category->id)->get()->take(3);
@endphp

<div class="col-md-12">
    <div style="width: 1020px; margin: 20px 0;">
        <h1 style="text-align: center">{{ $category->title }}</h1>
    </div>
</div>

@foreach($items as $item)
    <div class="col-md-4" style="margin-bottom: 30px;">
        <div class="grid-card">
            <a href="{{ route('site.project.show', ['slug' => $item->slug]) }}">
                <img src="{{ $item->image ? $item->image : asset('image/placeholder.jpg') }}" alt="{{ $item->title }}" style="width:100%">
                <div class="grid-card-text">
                    <h1 style="font-size:15px; color:#66BC51;padding: 15px; margin-top: -5px;">
                        {{ $item->title }}
                    </h1>
                </div>
            </a>
        </div>
    </div>
@endforeach

<div class="col-md-12">
    <div style="width: 1020px; margin: 20px 0; text-align: center;">
        <a style="padding: 10px 20px; background: #66bc51; color: #fff3cd; text-align: center" href="{{ route('site.project.index', ['category_id' => $category->id]) }}">More</a>
    </div>
</div>
