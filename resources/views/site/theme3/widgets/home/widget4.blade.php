@php
    // models
    use App\Models\Client;

    // clients
    $clients = Client::where('status', 1)->get();
@endphp

<div class="clients" style="margin-bottom: 20px;">
    <div class="container">
        <h3 class="t-clients">Our valued clients</h3>
        <ul id="mycarouselthree" class="jcarousel-skin-tango carousel">
            @foreach($clients as $ckey => $client)
                <li class="{{ $ckey == 0 ? 'active' : '' }}">
                    <img src="{{ $client->logo }}" width="200" height="100" alt="{{ $client->name }}">
                </li>
            @endforeach
        </ul>
    </div>
</div>