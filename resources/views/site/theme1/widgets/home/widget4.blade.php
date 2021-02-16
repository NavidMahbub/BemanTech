@php
    // models
    use App\Models\ProjectPost;
    use App\Models\ProjectCategory;

    // service category
    $category = ProjectCategory::where('slug', 'running-projects')->first();

    // services
    $items = ProjectPost::where('project_category_id', $category->id)->get();
@endphp

<div class="what-we-do-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="section-title text-center">
                    <h2>Running Projects</h2>
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
                                <a href="{{ route('site.project.show', ['slug' => $item->slug]) }}"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-12 text-center">
                <a href="{{ route('site.project.index', ['category_id' => $category->id]) }}" class="btn btn-outline-primary">Browse More</a>
            </div>
        </div>
    </div>
</div>
