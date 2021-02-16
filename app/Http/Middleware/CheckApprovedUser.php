<?php

namespace App\Http\Middleware;

use Closure;
use Uzzal\SslCommerz\Client;
use App\Models\Registration;
use Uzzal\SslCommerz\Customer;
use Illuminate\Support\Facades\Auth;


class CheckApprovedUser
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if(Auth::check()){
            $reg_check = Registration::where('user_id', Auth::user()->id)->first();
            if (!empty($reg_check) && $reg_check->payment != 1 && $reg_check->approved != 1) {
                $registration = $reg_check;
                $user = Auth::user();
                $customer = new Customer($registration->name, $registration->code, $user->email);
                $resp = Client::initSession($customer, 100);
                // saving transaction_id
                $registration->transaction_id = $resp->getTransactionId();
                $registration->update();
                Auth::logout();
                return redirect()->to($resp->getGatewayUrl());
            }
        }
        // If the status is not approved redirect to login
        if(Auth::check() && Auth::user()->approved != 1){
            Auth::logout();
            return redirect('/login');
        }
        return $response;
    }
}
