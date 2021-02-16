@php
    // models
    use App\Models\ContentCategory;

    // content data
    $welcome_message = ContentCategory::where('slug', 'welcome-message')->first();
@endphp

<div class="col-md-12">
    <div style="width: 1020px; margin: 20px 0;">
        <h1 style="text-align: center">Welcome Message</h1>
        <p style="text-align: justify;">{!! $welcome_message->body !!}</p>
    </div>
</div>
