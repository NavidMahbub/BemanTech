<?php

namespace App\Http\Controllers\Ajax;

use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;

// Model
use App\Models\GeoDistrict;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use NotificationHelper;

    public function index()
    {
        $users = User::all();

        if(!count($users))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'User not available.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $users,
            'code' => 200,
            'status' => 'success',
            'message' => 'User retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        if ($request->type!= '' && $request->type == 3) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|min:6',
                'geo_division_id' => 'required',
                'geo_district_id' => 'required',
                /*'geo_upazila_id' => 'required',
                'geo_union_id' => 'required',*/
                'type' => 'required'
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|min:6',
                'type' => 'required'
            ]);
        }
        
        $data = $request->all();
        // password
        $data['password'] = bcrypt($request->password);
        if ($request->type == 3 || $request->type == 4) {
            // generate code
            $code = '01';
            $code = str_pad($code, 4, "0", STR_PAD_LEFT);
            $user = User::whereIn('type', [3, 4])->orderBy('created_at', 'desc')->first();
            if (!empty($user)) {
                if ($user->code != '') {
                    $code = substr($user->code, 2, 100) + 1;
                    $code = str_pad($code, 4, "0", STR_PAD_LEFT);
                } else {
                    $code = substr($code, 2, 100) + 1;
                    $code = str_pad($code, 4, "0", STR_PAD_LEFT);
                }
            }
            if ($request->has('geo_district_id')) {
                $district = GeoDistrict::find($request->geo_district_id);
                if(!empty($district)) {
                    $district_code = (string) $district->code;
                } else {
                    $district_code = '';
                }
            } else {
                $district_code = '';
            }
            $data['code'] = $district_code . $code;
        }
        $data['approved'] = 1;
        $user = User::create($data);
        
        if (!$user)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'User cannot be created.'
            ];

            return response()->json($response, 400);
        }

        // send sms notification
        if (config('cms.registration.sms')) {
            try {
                if ($user->type == 3 || $user->type == 4) {
                    $body = "Congratulation, Your Registration has been successful. Your ID is {$user->code}. Login Id: {$user->email} and Password: {$request->password}.Thanks by Team PKCSBD";
                } else {
                    $body = "Congratulation, Your Registration has been successful. Login Id: {$user->email} and Password: {$request->password}.Thanks by Team PKCSBD";
                }
                $this->sendSmsNotification(
                    $user, $body);
            } catch (\Exception $e) {
                \Log::info('SMS not sent.');
            }
        }
        // send email notification
        if (config('cms.registration.email')) {
            if ($user->type == 3 || $user->type == 4) {
                $body = "Congratulation, Your Registration has been successful. Your ID is {$user->code}. Login Id: {$user->email} and Password: {$request->password}.Thanks by Team PKCSBD";
            } else {
                $body = "Congratulation, Your Registration has been successful. Login Id: {$user->email} and Password: {$request->password}.Thanks by Team PKCSBD";
            }
            $this->sendEmailNotification($user, $body);
        }

        $response = [
            'data' => $user,
            'code' => 201,
            'status' => 'success',
            'message' => 'User created successfully.'
        ];

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (empty($user))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'User not found.'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'data' => $user,
            'code' => 200,
            'status' => 'success',
            'message' => 'User retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
    
        if (empty($user))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'User not found.'
            ];
        
            return response()->json($response, 404);
        }
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id
        ]);
    
        $data = $request->all();

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }

        if ($user->type == 3 || $user->type == 4) {
            if ($request->has('geo_district_id')) {
                $district = GeoDistrict::find($request->geo_district_id);
                if(!empty($district)) {
                    $district_code = $district->code;
                } else {
                    $district_code = '';
                }
            } else {
                $district_code = '';
            }

            if ($user->geo_district_id != '') {
                $code = substr($user->code, 2, 100);
                $code = str_pad($code, 4, "0", STR_PAD_LEFT);
            } else {
                if ($user->code == '') {
                    $code = '01';
                    $code = str_pad($code, 4, "0", STR_PAD_LEFT);
                } else {
                    $code = str_pad($user->code, 4, "0", STR_PAD_LEFT);
                }
            }
            $data['code'] = $district_code . $code;
        }

        $user = User::find($id)->update($data);

        if (!$user)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'User cannot be updated.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => $user,
            'code' => 201,
            'status' => 'success',
            'message' => 'User updated successfully.'
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (empty($user))
        {
            $response = [
                'data' => '',
                'code' => 404,
                'status' => 'error',
                'message' => 'User not found.'
            ];

            return response()->json($response, 404);
        }

        $user = User::find($id)->delete();

        if (!$user)
        {
            $response = [
                'data' => '',
                'code' => 400,
                'status' => 'error',
                'message' => 'User cannot be deleted.'
            ];

            return response()->json($response, 400);
        }

        $response = [
            'data' => '',
            'code' => 201,
            'status' => 'success',
            'message' => 'User deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
