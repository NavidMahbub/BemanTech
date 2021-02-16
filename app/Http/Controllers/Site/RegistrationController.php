<?php

namespace App\Http\Controllers\Site;

use App\Helpers\BkashHelper;
use App\Helpers\NotificationHelper;
use App\Models\GeoDivision;
use App\User;
use App\Models\GeoUnion;
use App\Models\GeoUpazila;
use App\Models\GeoDistrict;
use Illuminate\Http\Request;
use App\Models\Registration;
use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Uzzal\SslCommerz\Client;
use Uzzal\SslCommerz\Customer;
use Uzzal\SslCommerz\IpnNotification;

class RegistrationController extends Controller
{
    use UploadHelper, NotificationHelper;
    protected $form_groups;
    protected $full_form_groups;
    protected $form_validations;

    public function __construct()
    {
        $this->form_groups = config('cms.registration.shortForm');
        if (auth()->check()) {
            if (auth()->user()->type == 4) {
                $this->form_groups[1]['fields'][7] = [
                    'name' => 'Registration Code',
                    'name_bn' => 'রেজিস্ট্রেশন কোড',
                    'field' => 'code',
                    'grid' => 'col-md-6',
                    'type' => 'text',
                    'rules' => '',
                    'icon' => 'icon-code',
                    'star' => false
                ];
            }
        }
        $this->full_form_groups = config('cms.registration.form');
    }

    public function index()
    {
        $form_groups = json_decode(json_encode($this->form_groups));

        return view('site.' . config('cms.theme') . '.registration.index', compact('form_groups'));
    }

    public function store(Request $request)
    {
        $reg_check = Registration::where('data', 'LIKE', '%"phone":"' . $request->phone . '"%')->first();
        if (!empty($reg_check) && $reg_check->payment != 1 && $reg_check->approved != 1) {
            $registration = $reg_check;
            $user = User::findOrFail($registration->user_id);
            $customer = new Customer($registration->name, $registration->code, $user->email);
            $resp = Client::initSession($customer, 100);
            // saving transaction_id
            $registration->transaction_id = $resp->getTransactionId();
            $registration->update();
            return redirect()->to($resp->getGatewayUrl());
        }
        // form validation
        $form_groups = $this->form_groups;
        $rules = $this->getRulesArray($form_groups);

        // validating request
        $request->validate($rules);

        // validation for email input
        if(filter_var($request->phone, FILTER_VALIDATE_EMAIL)) {
            $request->validate([
                'phone' => 'required|unique:users,email'
            ]);
        }
    
        // add code property
        $request->request->add(['code', '']);

        // retrieve basic info
        $basic_info = $request->except(['email', 'phone', 'password', 'password_confirmation', '_token']);
    
        // set geo data
        if ($request->has('geo_district_id')) {
            $district = GeoDistrict::find($request->geo_district_id);
            $basic_info['geo_district_id'] = $district->name_bng;
            $basic_info['district_code'] = $district->code;
        }

        // image
        $image = '';

        // file upload
        foreach ($this->full_form_groups as $form_group) {
            foreach ($form_group['fields'] as $field) {
                if ($request->has($field['field'])) {
                    if ($field['type'] == 'file') {
                        if ($request->has($field['field'])) {
                            // upload file
                            $file = $this->uploadData($request, $field['field']);
                            $image = $file;
                            $basic_info[$field['field']] = $file;
                        } else {
                            $image = NULL;
                            $basic_info[$field['field']] = '';
                        }
                    } else {
                        $basic_info[$field['field']] = $request->{$field['field']};
                    }
                } else {
                    $basic_info[$field['field']] = '';
                }
            }
        }
    
        // set geo data
        if ($request->has('geo_division_id')) {
            $basic_info['geo_division_id'] = GeoDivision::find($request->geo_division_id)->name_bng;
        } else {
            $basic_info['geo_division_id'] = NULL;
        }
        if ($request->has('geo_district_id')) {
            $district = GeoDistrict::find($request->geo_district_id);
            $basic_info['geo_district_id'] = $district->name_bng;
            $basic_info['district_code'] = $district->code;
            $request->district_code = $district->code;
        } else {
            $basic_info['geo_district_id'] = NULL;
        }
        if ($request->has('geo_upazila_id')) {
            $basic_info['geo_upazila_id'] = GeoUpazila::find($request->geo_upazila_id)->name_bng;
        } else {
            $basic_info['geo_upazila_id'] = NULL;
        }
        if ($request->has('geo_union_id') && $request->get('geo_union_id') != null) {
            $basic_info['geo_union_id'] = GeoUnion::find($request->geo_union_id)->name_bng;
        } else {
            $basic_info['geo_union_id'] = NULL;
        }

        // registration data array
        /*$registration_data['code'] = $code;
        $registration_data['reg_code'] = $request->district_code . $code;*/
        $registration_data['name'] = $request->name;
        $registration_data['data'] = json_encode($basic_info);
        $registration_data['phone'] = $request->phone;
        $registration_data['geo_division_id'] = $request->geo_division_id;
        $registration_data['geo_district_id'] = $request->geo_district_id;
        $registration_data['geo_upazila_id'] = $request->geo_upazila_id;
        $registration_data['geo_union_id'] = $request->geo_union_id;
        $registration_data['temp_password'] = substr($request->player_mobile, -6);
        $registration_data['image'] = $image;

        // proceed registration
        $registration = Registration::create($registration_data);

        // registering users
        if (config('cms.registration.user')) {
            $this->userRegistration($request, $registration, $image);
        }

        // process payment
        if (config('cms.registration.payment')) {
            $user = User::findOrFail($registration->user_id);
            $customer = new Customer($registration->name, $registration->code, $user->email);
            $resp = Client::initSession($customer, 100);
            // saving transaction_id
            $registration->transaction_id = $resp->getTransactionId();
            $registration->update();
            return redirect()->to($resp->getGatewayUrl());
        } else {
            // redirecting
            return redirect()->back();
        }
    }

    public function getRulesArray($form_groups)
    {
        $rules = [];
        foreach ($form_groups as $form_group) {
            foreach ($form_group['fields'] as $field) {
                $rules[$field['field']] = $field['rules'];
            }
        }
        return $rules;
    }

    private function uploadData($request, $file)
    {
        $data = $request->{$file};
        $path = $file;
        $prefix = $file;
        $file = $this->uploadFile($data, $path, $prefix);
        return $file;
    }

    public function userRegistration($request, $registration, $image)
    {
        // retrieving account info
        $account_info = $request->only(['name', 'player_mobile']);

        // creating user
        $user = User::create([
            'name' => $account_info['name'],
            'email' => $account_info['player_mobile'],
            'phone' => $account_info['player_mobile'],
            'password' => bcrypt(substr($account_info['player_mobile'], -6)),
            'image' => $image
        ]);

        // update registration user id
        $registration->user_id = $user->id;
        $registration->update();

        /*if (!config('cms.registration.payment')) {
            // send sms notification
            if (config('cms.registration.sms')) {
                $body = "Congratulation, Your Registration has been successful. Your ID is {$registration->reg_code}. Login Id: {$user->email} and Password: {$registration->temp_password}.Thanks by Team PKCSBD";
                $this->sendSmsNotification($user, $body);
            }
            // send email notification
            if (config('cms.registration.email')) {
                $body = "Congratulation, Your Registration has been successful. Your ID is {$registration->reg_code}. Login Id: {$user->email} and Password: {$registration->temp_password}.Thanks by Team PKCSBD";
                $this->sendEmailNotification($user, $body);
            }
        }*/
    }

    public function paymentIndex()
    {
        if (request()->get('code')) {
            $code = request()->get('code');
            $registration = Registration::where('code', $code)->firstOrFail();
            if ($registration->payment) {
                return redirect()->route('site.registration.successful');
            }
            return view('site.' . config('cms.theme') . '.registration.payment', compact('code'));
        } else {
            return redirect()->to('registration');
        }
    }

    public function paymentStore(Request $request)
    {
        $registration = Registration::where('code', $request->code)->firstOrFail();
        $user = User::findOrFail($registration->user_id);
        $customer = new Customer($registration->name, $registration->code, $user->email);
        $resp = Client::initSession($customer, 100);
        // saving transaction_id
        $registration->transaction_id = $resp->getTransactionId();
        $registration->update();
        return redirect()->to($resp->getGatewayUrl());
    }

    public function paymentSuccess(Request $request)
    {
        if($request->status == 'VALID' && $request->risk_level == 0) {
            // update registration info
            $registration = Registration::where('transaction_id', $request->tran_id)->first();
            // registration code
            $code = 50001;
            $district = GeoDistrict::find($registration->geo_district_id);
            $latest_reg = Registration::where('payment', 1)->whereIn('type', [0, 1])->orderBy('code', 'desc')->first();
            if (!empty($latest_reg) && $latest_reg->code != '') {
                $code = $latest_reg->code + 1;
            }
            $registration->code = $code;
            $registration->reg_code = $district->code . $code;
            $registration->payment_id = $request->val_id;
            $registration->amount = $request->store_amount;
            $registration->payment_data = json_encode($request->all());
            $registration->approved = 1;
            $registration->payment = 1;
            $registration->update();
            // update user info
            $user = User::find($registration->user_id);
            $user->approved = 1;
            $user->update();
            if (!empty($user)) {
                // send sms notification
                $body = "Congratulation, Your Registration has been successful. Your ID is {$registration->reg_code}. Login Id: {$user->email} and Password: {$registration->temp_password}.Thanks by Team PKCSBD";
                $this->sendSmsNotification($user, $body);
                $this->sendEmailNotification($user, $body);
            }
            // flash notification
            Session::flash('success', 'Payment Successful!');
            return redirect()->route('site.registration.successful');
        } else {
            $verify = Client::verifyOrder($request->val_id);
            if ($verify->getStatus() == 'VALID' || $verify->getStatus() == 'VALIDATED') {
                // update registration info
                $registration = Registration::where('transaction_id', $request->tran_id)->first();
                // registration code
                $code = 50001;
                $district = GeoDistrict::find($registration->geo_district_id);
                $registration = Registration::where('payment', 1)->whereIn('type', [0, 1])->orderBy('code', 'desc')->first();
                if (!empty($registration)) {
                    $code = $registration->code + 1;
                }
                $registration->code = $code;
                $registration->reg_code = $district->code . $code;
                $registration->payment_id = $request->val_id;
                $registration->amount = $request->store_amount;
                $registration->payment_data = json_encode($request->all());
                $registration->approved = 1;
                $registration->payment = 1;
                $registration->update();
                // update user info
                $user = User::find($registration->user_id);
                $user->approved = 1;
                $user->update();
                if (!empty($user)) {
                    // send sms notification
                    $body = "Congratulation, Your Registration has been successful. Your ID is {$registration->reg_code}. Login Id: {$user->email} and Password: {$registration->temp_password}.Thanks by Team PKCSBD";
                    $this->sendSmsNotification($user, $body);
                    $this->sendEmailNotification($user, $body);
                }
                // flash notification
                Session::flash('success', 'Payment Successful!');
                return redirect()->route('site.registration.successful');
            } else {
                // flash notification
                Session::flash('error', 'Payment failed! Try again.');
                $registration = Registration::where('transaction_id', $request->tran_id)->first();
                if (!empty($registration)) {
                    $code = $registration->code;
                    return redirect()->route('site.registration.payment.index', ['code' => $code]);
                }
                return redirect()->to('registration');
            }
        }
    }

    public function paymentFail(Request $request)
    {
        // flash notification
        Session::flash('error', 'Payment failed! Try again.');
        $registration = Registration::where('transaction_id', $request->tran_id)->first();
        if (!empty($registration)) {
            $code = $registration->code;
            return redirect()->route('site.registration.payment.index', ['code' => $code]);
        }
        return redirect()->to('registration');
    }

    public function paymentCancel(Request $request)
    {
        // flash notification
        Session::flash('error', 'Payment cancelled!!');
        $registration = Registration::where('transaction_id', $request->tran_id)->first();
        if (!empty($registration)) {
            $code = $registration->code;
            return redirect()->route('site.registration.payment.index', ['code' => $code]);
        }
        return redirect()->to('registration');
    }

    public function paymentIpn(Request $request)
    {
        if(ipn_hash_varify(config('sslcommerz.store_password'))){
            $ipn = new IpnNotification($_POST);
            $val_id = $ipn->getValId();
            $verify = Client::verifyOrder($val_id);
            if ($verify->getStatus() == 'VALID' || $verify->getStatus() == 'VALIDATED') {
                // update registration info
                $registration = Registration::where('transaction_id', $request->tran_id)->first();
                $registration->payment_id = $request->val_id;
                $registration->amount = $request->store_amount;
                $registration->payment_data = json_encode($request->all());
                $registration->approved = 1;
                $registration->payment = 1;
                $registration->update();
            }
        }
    }

    public function successful() {
        return view('site.' . config('cms.theme') . '.registration.successful');
    }
}
