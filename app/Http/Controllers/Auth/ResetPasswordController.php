<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function reset(Request $request)
    {
        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $request->validate($this->rules(), $this->validationErrorMessages());
            $response = $this->broker()->reset(
                $this->credentials($request), function ($user, $password) {
                    $this->resetPassword($user, $password);
                }
            );
            return $response == Password::PASSWORD_RESET
                ? $this->sendResetResponse($request, $response)
                : $this->sendResetFailedResponse($request, $response);
        }
        else {
            $request->validate([
                'token' => 'required',
                'email' => 'required',
                'password' => 'required|confirmed',
            ]);
            $user = User::where('email', $request->email)->orWhere('phone', $request->email)->first();
            if ($user) {
                $user->password = bcrypt($request->password);
                $user->update();
                DB::table('password_resets')->where('email', $request->email)->delete();
            }
            Session::flash('status', 'Password reset successfully');
            return redirect('login');
        }
    }
}
