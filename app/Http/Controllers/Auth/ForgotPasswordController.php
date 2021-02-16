<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use function GuzzleHttp\Psr7\str;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendResetLinkEmail(Request $request)
    {
        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $this->validateEmail($request);
            $response = $this->broker()->sendResetLink(
                $this->credentials($request)
            );
            return $response == Password::RESET_LINK_SENT
                ? $this->sendResetLinkResponse($request, $response)
                : $this->sendResetLinkFailedResponse($request, $response);
        }
        else {
            // processing requests
            if (strpos($request->email, "+88") === 0 || strpos($request->email, "88") === 0) {
                $request->email = str_replace('+88', '', $request->email);
                $request->email = str_replace('88', '', $request->email);
            }
            if (preg_match('/^[0-9]{11}+$/', $request->email)) {
                $request->validate(['email' => 'required']);
                $user = User::where('email', $request->email)->orWhere('phone', $request->email)->first();
                if ($user) {
                    $code = random_int(10000, 999999);
                    $data = [
                        'email' => $request->email,
                        'token' => $code,
                        'created_at' => Carbon::now()
                    ];
                    if (DB::table('password_resets')->where('email', $request->email)->exists()) {
                        $old_time = Carbon::createFromDate(
                            DB::table('password_resets')
                                ->where('email', $request->email)
                                ->first()->created_at
                        );
                        $current_time = Carbon::now();
                        $waiting_time = $current_time->diffInMinutes($old_time);
                        if ($waiting_time > 0) {
                            DB::table('password_resets')->where('email', $request->email)->delete();
                            DB::table('password_resets')->insert($data);
                            $this->sendResetCodeInSms($data);
                            return redirect(url('password/reset-code?phone=' . $request->email));
                        } else {
                            Session::flash('error_msg', "Please retry after {$waiting_time} minutes");
                            return redirect()->back();
                        }
                    } else {
                        DB::table('password_resets')->insert($data);
                        $this->sendResetCodeInSms($data);
                        return redirect(url('password/reset-code?phone=' . $request->email));
                    }
                } else {
                    Session::flash('error_msg', "Phone/Email doesn't match");
                    return redirect()->back();
                }
            } else {
                Session::flash('error_msg', "Please try with valid phone or email.");
                return redirect()->back();
            }
        }
    }

    private function sendResetCodeInSms($data) {
        $phone = $data['email'];
        $body = "Your password reset code is: {$data['token']} - AAB.";
        $api = "http://api.bulksms.icombd.com/api/v3/sendsms/plain?user=beman-tech&password=Bemantech2019&sender=TLS&SMSText={$body}&GSM=88{$phone}";
        $client = new Client();
        $response = $client->get($api);
        return $response->getStatusCode();
    }

    public function resetCode()
    {
        if (request()->has('phone')) {
            $phone = request()->get('phone');
            return view('auth.passwords.code', compact('phone'));
        } else {
            return redirect()->back();
        }
    }

    public function postResetCode(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'phone' => 'required'
        ]);

        $reset = DB::table('password_resets')
            ->where('email', $request->phone)
            ->where('token', $request->code)
            ->first();

        if ($reset) {
            $code = $reset->token;
            $url = url("/password/reset/" . $code);
            return redirect($url);
        }
    }
}
