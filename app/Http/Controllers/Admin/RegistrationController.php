<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\GeoUnion;
use App\Models\GeoUpazila;
use App\Models\GeoDistrict;
use App\Models\GeoDivision;
use App\Models\Registration;
use App\Helpers\BkashHelper;
use Illuminate\Http\Request;
use App\Helpers\UploadHelper;
use Illuminate\Routing\Controller;
use App\Helpers\NotificationHelper;
use Illuminate\Support\Facades\Session;
use App\Helpers\RegistrationDataHelper;
use App\DataTables\RegistrationDataTable;

class RegistrationController extends Controller
{
    use UploadHelper, BkashHelper, NotificationHelper, RegistrationDataHelper;
    protected $form_groups;
    protected $full_form_groups;
    protected $form_validations;

    public function __construct()
    {
        $this->form_groups = config('cms.registration.shortForm');
        if(auth()->check()) {
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

    public function index(RegistrationDatatable $datatable)
    {
        $this->shareRegistrationData();
        $this->shareBlogData();
        return $datatable->render('admin.registration.index');
    }

    public function create()
    {
        $form_groups = json_decode(json_encode($this->form_groups));
        return view('admin.registration.create', compact('form_groups'));
    }
    
    public function store(Request $request)
    {
        // form data
        $form_groups = $this->form_groups;
        // validation
        $rules = $this->getRulesArray($form_groups);
        $request->validate($rules);
        // retrieve basic info
        $basic_info = $request->except(['email', 'phone', 'password', 'password_confirmation', '_token']);
        // set geo data
        if ($request->has('geo_district_id')) {
            $district = GeoDistrict::find($request->geo_district_id);
            $basic_info['geo_district_id'] = $district->name_bng;
            $basic_info['district_code'] = $district->code;
            $request->district_code = $district->code;
        } else {
            $basic_info['district_code'] = null;
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
            $basic_info['geo_division_id'] = null;
        }
        if ($request->has('geo_district_id')) {
            $district = GeoDistrict::find($request->geo_district_id);
            $basic_info['geo_district_id'] = $district->name_bng;
            $basic_info['district_code'] = $district->code;
            $request->district_code = $district->code;
        } else {
            $basic_info['geo_district_id'] = null;
        }
        if ($request->has('geo_upazila_id')) {
            $basic_info['geo_upazila_id'] = GeoUpazila::find($request->geo_upazila_id)->name_bng;
        } else {
            $basic_info['geo_upazila_id'] = null;
        }
        if ($request->has('geo_union_id')) {
            $basic_info['geo_union_id'] = GeoUnion::find($request->geo_union_id)->name_bng;
        } else {
            $basic_info['geo_union_id'] = null;
        }
    
        if (auth()->user()->type == 0 || auth()->user()->type == 2) {
            $approved = 1;
        } else {
            $approved = 0;
        }

        if (auth()->user()->type == 4) {
            if (!empty($request->code)) {
                $code = $request->code;
            } else {
                $code = '';
                // generate code
                /*$code = 50001;
                $registration = Registration::where('payment', 1)->whereIn('type', [0, 1])->orderBy('code', 'desc')->first();
                if (!empty($registration)) {
                    $code = $registration->code + 1;
                }*/
            }
        } else {
            $code = '';
            // generate code
            /*$code = 50001;
            $registration = Registration::where('payment', 1)->whereIn('type', [0, 1])->orderBy('code', 'desc')->first();
            if (!empty($registration)) {
                $code = $registration->code + 1;
            }*/
        }
    
        // make registration data
        $registration_data['code'] = $code;
        //$registration_data['reg_code'] = $request->district_code . $code;
        $registration_data['name'] = $request->name;
        $registration_data['data'] = json_encode($basic_info);
        $registration_data['payment_type'] = $request->payment_type;
        $registration_data['account_no'] = $request->account_no;
        $registration_data['amount'] = $request->amount ? $request->amount : 75;
        $registration_data['payment'] = 0;
        $registration_data['approved'] = $approved;
        $registration_data['geo_division_id'] = $request->geo_division_id;
        $registration_data['geo_district_id'] = $request->geo_district_id;
        $registration_data['geo_upazila_id'] = $request->geo_upazila_id;
        $registration_data['geo_union_id'] = $request->geo_union_id;
        $registration_data['temp_password'] = substr($request->player_mobile, -6);
        $registration_data['image'] = $image;
        $registration_data['type'] = auth()->user()->type == 4 ? 2 : 1;
        $registration_data['created_by'] = auth()->user()->id;
        $registration_data['field_admin'] = auth()->user()->code;

        // proceed registration
        $registration = Registration::create($registration_data);
    
        // registering users
        if (config('cms.registration.user')) {
            $this->userRegistration($request, $registration, $image);
        }
    
        // flash notification
        Session::flash('success', 'Form submitted successfully!');
    
        // redirecting
        return redirect()->back();
    }
    
    public function show($id)
    {
        $form_data = json_decode(Registration::findOrFail($id)->data);
        unset($this->form_groups[2]);
        unset($this->form_groups[3]);
        $form_groups = json_decode(json_encode($this->form_groups));
        return view('admin.registration.show', compact('form_data', 'form_groups'));
    }

    public function edit($id)
    {
        unset($this->form_groups[2]);
        unset($this->form_groups[3]);
        $form_data = json_decode(Registration::findOrFail($id)->data);
        $form_groups = json_decode(json_encode($this->form_groups));
        // find registration
        $registration = Registration::findOrFail($id);
        return view('admin.registration.edit', compact('form_data', 'form_groups', 'registration'));
    }

    public function update(Request $request, $id)
    {
        // find registration
        $registration = Registration::findOrFail($id);
        $reg_data = json_decode($registration->data);
        // form data
        unset($this->form_groups[2]);
        unset($this->form_groups[3]);
        $form_groups = $this->form_groups;
        // validation
        $rules = $this->getRulesArray($form_groups);
        unset($rules['image']);
        $request->validate($rules);
        // retrieve basic info
        $basic_info = $request->except(['email', 'phone', 'password', 'password_confirmation', '_token']);
        // set geo data
        if ($request->has('geo_district_id')) {
            $district = GeoDistrict::find($request->geo_district_id);
            $basic_info['geo_district_id'] = $district->name_bng;
            $basic_info['district_code'] = $district->code;
            $request->district_code = $district->code;
        }
        // image
        $image = '';
        // file upload
        unset($this->full_form_groups[6]);
        unset($this->full_form_groups[5]);
        foreach ($this->full_form_groups as $form_group) {
            foreach ($form_group['fields'] as $field) {
                if ($field['type'] == 'file') {
                    if ($request->has($field['field'])) {
                        // upload file
                        $file = $this->uploadData($request, $field['field']);
                        $image = $file;
                        $basic_info[$field['field']] = $file;
                    } else {
                        $basic_info[$field['field']] = $registration->image;
                        $image = $registration->image;
                    }
                } else {
                    if (!$request->has($field['field'])) {
                        $basic_info[$field['field']] = '';
                    }
                }
            }
        }
        // set geo data
        if ($request->has('geo_division_id')) {
            $basic_info['geo_division_id'] = GeoDivision::find($request->geo_division_id)->name_bng;
        } else {
            $basic_info['geo_division_id'] = null;
        }
        if ($request->has('geo_district_id')) {
            $district = GeoDistrict::find($request->geo_district_id);
            $basic_info['geo_district_id'] = $district->name_bng;
            $basic_info['district_code'] = $district->code;
            $request->district_code = $district->code;
        } else {
            $basic_info['geo_district_id'] = null;
        }
        if ($request->has('geo_upazila_id')) {
            $basic_info['geo_upazila_id'] = GeoUpazila::find($request->geo_upazila_id)->name_bng;
        } else {
            $basic_info['geo_upazila_id'] = null;
        }
        if ($request->has('geo_union_id') && $request->get('geo_union_id') != null) {
            $basic_info['geo_union_id'] = GeoUnion::find($request->geo_union_id)->name_bng;
        } else {
            $basic_info['geo_union_id'] = null;
        }

        // make registration data
        if (auth()->user()->type == 4) {
            $registration_data['reg_code'] = $request->district_code . $request->code;
        } else {
            $registration_data['reg_code'] = $request->district_code . $registration->code;
        }
        $registration_data['name'] = $request->name;
        $registration_data['data'] = json_encode($basic_info);
        $registration_data['geo_division_id'] = $request->geo_division_id;
        $registration_data['geo_district_id'] = $request->geo_district_id;
        $registration_data['geo_upazila_id'] = $request->geo_upazila_id;
        $registration_data['geo_union_id'] = $request->geo_union_id;
        $registration_data['image'] = $image;

        // proceed registration
        Registration::find($registration->id)->update($registration_data);

        // flash notification
        Session::flash('success', 'Information Update successfully!');

        // redirecting
        return redirect()->back();
    }

    public function approve($id)
    {
        $registration = Registration::find($id);
        if ($registration->approved == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $registration->approved = $status;
        if ($registration->type == 0) {
            $registration->payment = 1;
            $registration->amount = 97.50;
        } else {
            $registration->payment = 1;
            $registration->amount = 75;
        }
        if ($registration->notified == 0 && $registration->code == '') {
            // registration code
            $code = 50001;
            $district = GeoDistrict::find($registration->geo_district_id);
            $latest_reg = Registration::where('payment', 1)->whereIn('type', [0, 1])->orderBy('code', 'desc')->first();
            if (!empty($latest_reg) && $latest_reg->code != '') {
                $code = $latest_reg->code + 1;
            }
            $registration->code = $code;
            $registration->reg_code = $district->code . $code;
        }

        $registration->update();

        $user = User::find($registration->user_id);
        if ($user->approved == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $user->approved = $status;
        $user->update();

        if ($registration->notified == 0) {
            // send sms notification
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
            // updating notified status
            $registration->notified = 1;
            $registration->update();
        }

        return redirect()->back();
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

        if (auth()->user()->type == 0) {
            $approved = 1;
        } else {
            $approved = 0;
        }

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
    
        if ($approved) {
            // send sms notification
            if (config('cms.registration.sms')) {
                $body = "Congratulation, Your Registration has been successful. Your ID is {$registration->reg_code}. Login Id: {$user->email} and Password: {$request->password}.Thanks by Team PKCSBD";
                $this->sendSmsNotification($user, $body);
            }
            // send email notification
            if (config('cms.registration.email')) {
                $body = "Congratulation, Your Registration has been successful. Your Reg. Code No Is {$registration->reg_code}. Login Id: {$user->email} and Password: {$request->password}.Thanks by Team PKCSBD";
                $this->sendEmailNotification($user, $body);
            }
        }
    }

    public function registeredProfile()
    {
        $user_id = auth()->user()->id;
        $registration = Registration::where('user_id', $user_id)->first();
        if (!empty($registration)) {
            $form_data = json_decode($registration->data);
        } else {
            $form_data = [];
        }
        // form data
        unset($this->full_form_groups[6]);
        unset($this->full_form_groups[5]);
        $form_groups = json_decode(json_encode($this->full_form_groups));
        return view('admin.registration.profile', compact('form_data', 'form_groups'));
    }
    
    public function updateRegisteredProfile(Request $request)
    {
        $user_id = auth()->user()->id;
        $registration = Registration::where('user_id', $user_id)->first();
        // form data
        unset($this->full_form_groups[6]);
        unset($this->full_form_groups[5]);
        $form_groups = $this->full_form_groups;
        // validation
        $rules = $this->getRulesArray($form_groups);
        unset($rules['image']);
        $request->validate($rules);
        // retrieve basic info
        $basic_info = $request->except(['email', 'phone', 'password', 'password_confirmation', '_token']);
        // set geo data
        if ($request->has('geo_district_id')) {
            $district = GeoDistrict::find($request->geo_district_id);
            $basic_info['geo_district_id'] = $district->name_bng;
            $basic_info['district_code'] = $district->code;
            $request->district_code = $district->code;
        }
        // image
        $image = '';
        // file upload
        foreach ($this->form_groups as $form_group) {
            foreach ($form_group['fields'] as $field) {
                if ($field['type'] == 'file') {
                    if ($request->has($field['field'])) {
                        // upload file
                        $file = $this->uploadData($request, $field['field']);
                        $image = $file;
                        $basic_info[$field['field']] = $file;
                    } else {
                        $basic_info[$field['field']] = $registration->image;
                        $image = $registration->image;
                    }
                }
            }
        }
        // set geo data
        if ($request->has('geo_division_id')) {
            $basic_info['geo_division_id'] = GeoDivision::find($request->geo_division_id)->name_bng;
        } else {
            $basic_info['geo_division_id'] = null;
        }
        if ($request->has('geo_district_id')) {
            $district = GeoDistrict::find($request->geo_district_id);
            $basic_info['geo_district_id'] = $district->name_bng;
            $basic_info['district_code'] = $district->code;
            $request->district_code = $district->code;
        } else {
            $basic_info['geo_district_id'] = null;
        }
        if ($request->has('geo_upazila_id')) {
            $basic_info['geo_upazila_id'] = GeoUpazila::find($request->geo_upazila_id)->name_bng;
        } else {
            $basic_info['geo_upazila_id'] = null;
        }
        if ($request->has('geo_union_id') && $request->get('geo_union_id') != null) {
            $basic_info['geo_union_id'] = GeoUnion::find($request->geo_union_id)->name_bng;
        } else {
            $basic_info['geo_union_id'] = null;
        }
        // make registration data
        if (auth()->user()->type == 4) {
            $registration_data['reg_code'] = $request->district_code . $request->code;
        } else {
            $registration_data['reg_code'] = $request->district_code . $registration->code;
        }
        $registration_data['name'] = $request->name;
        $registration_data['data'] = json_encode($basic_info);
        $registration_data['geo_division_id'] = $request->geo_division_id;
        $registration_data['geo_district_id'] = $request->geo_district_id;
        $registration_data['geo_upazila_id'] = $request->geo_upazila_id;
        $registration_data['geo_union_id'] = $request->geo_union_id;
        $registration_data['image'] = $image;
        // proceed registration
        Registration::find($registration->id)->update($registration_data);
        // flash notification
        Session::flash('success', 'Information Update successfully!');
        // redirecting
        return redirect()->back();
    }
}
