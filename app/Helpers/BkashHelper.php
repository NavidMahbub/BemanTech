<?php namespace App\Helpers;


use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use App\Models\BkashSetting;

trait BkashHelper
{
    protected $base_url = 'https://checkout.sandbox.bka.sh/v1.2.0-beta/checkout/';
    
    public function initializeBkashSetting()
    {
        if (!BkashSetting::count()) {
            BkashSetting::create([
                'app_id' => env('BKASH_APP_ID'),
                'app_secret' => env('BKASH_APP_SECRET'),
                'username' => env('BKASH_USERNAME'),
                'password' => env('BKASH_PASSWORD')
            ]);
        }
        $bkash = BkashSetting::first();
        if (empty($bkash->access_token) || empty($bkash->refresh_token)) {
            $this->getAccessToken();
        }
        $current_time = Carbon::now();
        $creation_time = Carbon::make($bkash->created_at);
        if ($current_time->diffInSeconds($creation_time) > ($bkash->duration - 300)) {
            $this->refreshAccessToken();
        }
    }
    
    private function getAccessToken()
    {
        $client = new Client([
            'base_uri' => $this->base_url,
            'headers' => [
                'username' => env('BKASH_USERNAME'),
                'password' => env('BKASH_PASSWORD')
            ]
        ]);
        $body = json_encode([
            'app_key' => env('BKASH_APP_ID'),
            'app_secret' => env('BKASH_APP_SECRET')
        ]);
        $response = $client->post('token/grant', [
            'body' => $body
        ]);
        $data = json_decode($response->getBody()->getContents());
        BkashSetting::first()->update([
            'access_token' => $data->id_token,
            'duration' => $data->expires_in,
            'refresh_token' => $data->refresh_token
        ]);
        \Log::info('Access Token');
        \Log::info(json_encode([
            'headers' => [
                'username' => env('BKASH_USERNAME'),
                'password' => env('BKASH_PASSWORD')
            ],
            'body' => [
                'app_key' => env('BKASH_APP_ID'),
                'app_secret' => env('BKASH_APP_SECRET')
            ]
        ]));
        \Log::info(json_encode($data));
    }
    
    private function refreshAccessToken()
    {
        $client = new Client([
            'base_uri' => $this->base_url,
            'headers' => [
                'username' => env('BKASH_USERNAME'),
                'password' => env('BKASH_PASSWORD')
            ]
        ]);
        $bkash = BkashSetting::first();
        $body = json_encode([
            'app_key' => env('BKASH_APP_ID'),
            'app_secret' => env('BKASH_APP_SECRET'),
            'refresh_token' => $bkash->refresh_token,
        ]);
        $response = $client->post('token/grant', [
            'body' => $body
        ]);
        $data = json_decode($response->getBody()->getContents());
        $bkash->update([
            'access_token' => $data->id_token,
            'duration' => $data->expires_in,
            'refresh_token' => $data->refresh_token
        ]);
    }
    
    private function createPaymentRequest($code)
    {
        $bkash = BkashSetting::first();
        $client = new Client([
            'base_uri' => $this->base_url,
            'headers' => [
                'Authorization' => $bkash->access_token,
                'X-APP-Key' => env('BKASH_APP_ID')
            ]
        ]);
        $body = json_encode([
            'amount' => env('BKASH_AMOUNT'),
            'currency' => 'BDT',
            'intent' => 'sale',
            'merchantInvoiceNumber' => $code
        ]);
        $response = $client->post('payment/create', [
            'body' => $body
        ]);
        $data = json_decode($response->getBody()->getContents());
        \Log::info('Create Payment');
        \Log::info(json_encode([
            'headers' => [
                'Authorization' => $bkash->access_token,
                'X-APP-Key' => env('BKASH_APP_ID')
            ],
            'body' => [
                'amount' => 10,
                'currency' => 'BDT',
                'intent' => 'sale',
                'merchantInvoiceNumber' => $code
            ]
        ]));
        \Log::info(json_encode($data));
        return $data;
    }

    private function executePaymentRequest($payment_id)
    {
        $bkash = BkashSetting::first();
        $client = new Client([
            'base_uri' => $this->base_url,
            'headers' => [
                'Authorization' => $bkash->access_token,
                'X-APP-Key' => env('BKASH_APP_ID')
            ]
        ]);
        $response = $client->post('payment/execute/' . $payment_id);
        $data = json_decode($response->getBody()->getContents());
        \Log::info('Execute Payment');
        \Log::info(json_encode([
            'headers' => [
                'Authorization' => $bkash->access_token,
                'X-APP-Key' => env('BKASH_APP_ID')
            ],
            'body' => []
        ]));
        \Log::info(json_encode($data));
        return $data;
    }

    private function queryPaymentRequest($payment_id)
    {
        $bkash = BkashSetting::first();
        $client = new Client([
            'base_uri' => $this->base_url,
            'headers' => [
                'Authorization' => $bkash->access_token,
                'X-APP-Key' => env('BKASH_APP_ID')
            ]
        ]);
        $response = $client->get('payment/query/' . $payment_id);
        $data = json_decode($response->getBody()->getContents());
        \Log::info('Query Payment');
        \Log::info(json_encode([
            'headers' => [
                'Authorization' => $bkash->access_token,
                'X-APP-Key' => env('BKASH_APP_ID')
            ],
            'body' => []
        ]));
        \Log::info(json_encode($data));
        return $data;
    }

    private function searchPaymentRequest($payment_id)
    {
        $bkash = BkashSetting::first();
        $client = new Client([
            'base_uri' => $this->base_url,
            'headers' => [
                'Authorization' => $bkash->access_token,
                'X-APP-Key' => env('BKASH_APP_ID')
            ]
        ]);
        $response = $client->get('payment/search/' . $payment_id);
        $data = json_decode($response->getBody()->getContents());
        \Log::info('Search Payment');
        \Log::info(json_encode([
            'headers' => [
                'Authorization' => $bkash->access_token,
                'X-APP-Key' => env('BKASH_APP_ID')
            ],
            'body' => []
        ]));
        \Log::info(json_encode($data));
        return $data;
    }
}
