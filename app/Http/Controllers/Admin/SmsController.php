<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Registration;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SmsController extends Controller
{
    use NotificationHelper;
    public function index($id)
    {
        $registration = Registration::find($id);
        if (!empty($registration)) {
            $user = \App\User::find($registration->user_id);
            if (!empty($user)) {
                if (config('cms.registration.sms')) {
                    try {
                        $body = "Congratulation, Your Registration has been successful. Your ID is {$registration->reg_code}. Login Id: {$user->email} and Password: {$registration->temp_password}.Thanks by Team PKCSBD";
                        $this->sendSmsNotification($user, $body);
                    } catch (\Exception $e) {
                        \Log::info('SMS not sent.');
                    }
                }
                // send email notification
                if (config('cms.registration.email')) {
                    $body = "Congratulation, Your Registration has been successful. Your ID is {$registration->reg_code}. Login Id: {$user->email} and Password: {$registration->temp_password}.Thanks by Team PKCSBD";
                    $this->sendEmailNotification($user, $body);
                }
                // flash notification
                Session::flash('success', 'Notification sent successfully!');
            }
        }

        return redirect()->back();
    }
}
