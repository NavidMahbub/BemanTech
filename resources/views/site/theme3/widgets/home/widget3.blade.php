@php
    // models
    use App\Models\ItemPost;
    use App\Models\ItemCategory;

    // item category
    $category = ItemCategory::where('slug', 'service')->first();

    // items
    $items = ItemPost::where('item_category_id', $category->id)->get();
@endphp

<div class="fresh_projects">
    <div class="container">
        <p>&nbsp;</p>
        <h2>Our Services</h2>
        <div class="jcarousel-skin-tango">
            <div class="jcarousel-container jcarousel-container-horizontal"
                 style="position: relative; display: block;">
                <div class="jcarousel-clip jcarousel-clip-horizontal" style="position: relative;">
                    <ul id="mycarouseltwo" class="jcarousel-list jcarousel-list-horizontal" style="overflow: hidden; position: relative; top: 0px; margin: 0px; padding: 0px; left: 0px; width: 1870px;">
                        @foreach($items as $item)
                            <li class="owl-carousel jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="float: left; list-style: outside none none;" jcarouselindex="1">
                                <div class="item">
                                    <div class="fresh_projects_list">
                                        <section class="cheapest">
                                            <div class="display">
                                                <div class="small-group">
                                                    <div class="small money">
                                                        <a href="javascript:void(0)">
                                                            <img src="{{ $item->image ? $item->image : asset('image/placeholder.jpg') }}" alt="{{ $item->title }}">
                                                            <div class="info">
                                                                <h3>{{ $item->title }}</h3>
                                                                <h4>{!! substr($item->body, 0, 25) !!}{{ strlen($item->body) > 25 ? '...' : '' }}</h4>
                                                                <div class="additionnal">
                                                                    <b>Read More</b>
                                                                </div>
                                                            </div>
                                                            <div class="hover"></div>
                                                        </a>
                                                    </div>
                                                </div>
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