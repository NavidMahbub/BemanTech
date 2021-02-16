<?php namespace App\Helpers;

use GuzzleHttp\Client;

trait NotificationHelper
{
    protected $sms_url = 'https://l9v3w.api.infobip.com/sms/1/text/query';

    public function sendSmsNotification($user, $body)
    {
        if(!filter_var($user->phone, FILTER_VALIDATE_EMAIL)) {
            $phone = str_replace('+88', '', $user->phone);
            $phone = str_replace('88', '', $phone);
            $api = $this->sms_url . "?username=sohel-mahmud&password=W7F!6ABtuX7FaA!&to=88{$phone}&text={$body}";
            $client = new Client();
            $response = $client->get($api);
            return $response->getStatusCode();
        }
    }

    public function sendEmailNotification($user, $body)
    {
        if(filter_var($user->phone, FILTER_VALIDATE_EMAIL)) {
            \Mail::send('emails.confirm', ['body' => $body], function ($m) use ($user) {
                $m->from('noreply@pkcsbd.com', 'Team PKCSBD.');
                $m->to($user->phone, $user->name)->subject('PKCSBD - Registration Confirmation.');
            });
        } else if(filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
            \Mail::send('emails.confirm', ['body' => $body], function ($m) use ($user) {
                $m->from('noreply@pkcsbd.com', 'Team PKCSBD.');
                $m->to($user->email, $user->name)->subject('PKCSBD - Registration Confirmation.');
            });
        }
    }
}