@php
    // models
    use App\Models\ContentPost;
    use App\Models\ContentCategory;

    // category
    $category = ContentCategory::where('slug', $content_slug)->first();

    // posts
    $items = ProjectPost::where('content_category_id', $category->id)->get();
@endphp
