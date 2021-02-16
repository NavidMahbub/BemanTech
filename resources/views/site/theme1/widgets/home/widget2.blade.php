@php
    // models
    use App\Models\ContentCategory;

    // content data
    $welcome_message = ContentCategory::where('slug', 'welcome-message')->first();
@endphp

<div class="what-we-do-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="section-title text-justify">
                    <h2 class="text-center">Welcome Message</h2>
                </div>
            </div>
            <div class="col-md-12">
                <div class="text-justify">
                    <p>{!! $welcome_message->body !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
