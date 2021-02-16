@php
    // models
    use App\Models\ContentPost;
    use App\Models\ContentCategory;

    // content category
    $category = ContentCategory::where('slug', 'sister-concern')->first();

    // contents
    $items = ContentPost::where('content_category_id', $category->id)->get();
@endphp

<div class="what-we-do-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="section-title text-center">
                    <h2>Sister Concerns</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($items as $item)
                <div class="col-md-4 mix design Seo col-sm-4">
                    <div class="single-portfolio mb-30">
                        <div class="portfolio-img">
                            <a href="#"><img src="{{ $item->image ? $item->image : asset('image/placeholder.jpg') }}" alt="" /></a>
                        </div>
                        <div class="portfolio-info">
                            <h2 class="text-white">{{ $item->title }}</h2>
                            <div class="portfolio-icon">
                                <a class="image-link" href="{{ $item->image ? $item->image : asset('image/placeholder.jpg') }}"><i class="fa fa-plus"></i></a>
                                <a href="{{ route('site.item.post.show', ['category_slug' => $category->slug, 'post_slug' => $item->slug, 'type' => 'grid']) }}"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-12 text-center">
                <a href="{{ route('site.item.post.index', ['category_slug' => $category->slug, 'type' => 'grid']) }}" class="btn btn-outline-primary">Browse More</a>
            </div>
        </div>
    </div>
</div>
