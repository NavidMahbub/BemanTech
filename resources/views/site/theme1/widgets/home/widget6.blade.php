@php
    // models
    use App\Models\Client;

    // clients
    $clients = Client::where('status', 1)->get();
@endphp


<div class="what-we-do-area pt-100 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="section-title text-center">
                    <h2>Our Clients</h2>
                </div>
            </div>
        </div>
        <div class="brand-active owl-carousel">
            @foreach($clients as $client)
                <div class="col-md-12">
                    <div class="single-brand">
                        <div class="brand-img">
                            <img src="{{ $client->logo }}" alt="" style="width: 185px; height: 95px;"/>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

