<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::where('status', 1)->paginate(8);
        return view('site.' . config('cms.theme') . '.client.index',compact('clients'));
    }


    public function show($clients_id)
    {
        // list
        

        // post
        $client_one = Client::where('id', $clients_id)->first();

        if (empty($client_one))
        {
            abort(404);
        }

        return view('site.' . config('cms.theme') . '.client.show', compact('client_one'));
    }


}
