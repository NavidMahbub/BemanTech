<?php

namespace App\Http\Controllers\Ajax;

use App\Helpers\UploadHelper;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\Controller;

// Model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingUserController extends Controller
{
    use UploadHelper;

    public function getProfile()
    {
        $user = Auth::user();

        $response = [
            'data' => $user,
            'code' => 201,
            'status' => 'success',
            'message' => ''
        ];

        return response()->json($response, 200);
    }

    public function updateProfile(Request $request)
    {
        //  validating requests
        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'phone' => 'required',
        ]);

        // authenticated user
        $user = Auth::user();

        if ($request->has('image')) {
            if ($user->image) {
                $this->removeFile($user->image);
            }
            $img_path = 'user/user_' . str_random(5) . '.jpg';
            $image = Image::make($request->image);
            $image->save(storage_path('app/public/') . $img_path, '60');
        }

        // updating user password
        $user->name = $request->name;
        $user->email = $request->email ? $request->email : $request->phone;
        $user->phone = $request->phone;
        $user->image = $img_path;
        $user->update();

        // response
        $response = [
            'data' => [],
            'code' => 200,
            'status' => 'success',
            'message' => 'Password updated successfully successfully.'
        ];
        return response()->json($response, 200);
    }

    public function updatePassword(Request $request)
    {
        //  validating requests
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);
        // updating user password
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->update();
        // response
        $response = [
            'data' => [],
            'code' => 200,
            'status' => 'success',
            'message' => 'Password updated successfully successfully.'
        ];
        return response()->json($response, 200);
    }
}
