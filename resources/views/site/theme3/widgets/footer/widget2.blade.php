@php

    // models
    use App\Models\ItemCategory;
    use App\Models\ItemPost;

    // item category
    $item_category = ItemCategory::where('slug', 'notice')->first();

    // $item posts
    $item_posts = ItemPost::where('item_category_id', $item_category->id)->get()->take(6);

@endphp

<div class="widget mb-30">
    <div class="widget-title">
        <h4>Notice</h4>
        <ul class="posts-list">
            @foreach($item_posts as $item_post)
                <li>
                    <h5 style="margin-left: 0;"><a href="{{ route('site.item.post.show', ['category_slug' => 'recruitment', 'post_slug' => $item_post->slug]) }}">{{ $item_post->title }}</a></h5>
                </li>
            @endforeach
        </ul>
    </div>
</div>
