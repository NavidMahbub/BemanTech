@php
    // models
    use App\Models\ContentPost;
    use App\Models\ContentCategory;

    // category
    $category = ContentCategory::where('slug', 'categories')->first();

    // posts
    $items = ContentPost::where('content_category_id', $category->id)->get();
@endphp

<div>
    <div class="container">
        <p>&nbsp;</p>
        <h2>Categories</h2>
        <div class="jcarousel-skin-tango">
            <div class="jcarousel-container jcarousel-container-horizontal"
                 style="position: relative; display: block;">
                <div class="jcarousel-clip jcarousel-clip-horizontal" style="position: relative;">
                    <ul id="mycarouseltop" class="jcarousel-list jcarousel-list-horizontal" style="overflow: hidden; position: relative; top: 0px; margin: 0px; padding: 0px; left: 0px; width: 1870px;">
                        @foreach($items as $item)
                            <li class="owl-carousel jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="float: left; list-style: outside none none;" jcarouselindex="1">
                                <div class="item">
                                    <div class="fresh_projects_list">
                                        <section class="cheapest">
                                            <div class="display">
                                                <a href="{{ route('site.content.post.show', ['category_slug' => $category->slug, 'post_slug' => $item->slug]) }}">
                                                    <div>
                                                        <img style="width: 100%;" src="{{ $item->image ? $item->image : asset('image/placeholder.jpg') }}" alt="{{ $item->title }}">
                                                        <div class="categories">
                                                            <h4 style="margin-top: 10px; margin-bottom: 10px;">{{ $item->title }}</h4>
                                                            {!! $item->body !!}
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal" style="display: block;" disabled="disabled"></div>
                <div class="jcarousel-next jcarousel-next-horizontal" style="display: block;"></div>
            </div>
        </div>
    </div>
    <div class="clearfix mar_top1"></div>
</div>