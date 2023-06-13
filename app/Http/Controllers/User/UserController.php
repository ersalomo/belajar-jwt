<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{File, Validator, Hash};
use Maatwebsite\Excel\Facades\Excel;
use App\Models\{User, Visitor};
use App\Exports\UsersExport;

class UserController extends Controller
{
    public function exportUsers() {
        return Excel::download(new  UsersExport, 'user-data.xlsx');
    }
    public function index()
    {
    }

    public function get_visitors(Request $request) {
        $visitors = Visitor::limit(50)
            ->get(['id', 'firstname','lastname','email','picture']);
        return response()->json([
            'status' => 'success',
            'data' => $visitors
        ],200);
    }

    public function changeProfile(Request $request) {

//        $image_base64 = base64_encode(file_get_contents($request->file('file')->path()));
        try {


        $user = auth("visitor")->user();
        $path = "app/public/users/";
        $file = $request->file('file');
        $oldPicture = $user->picture;
        $filePath = $path . $oldPicture;
        $new_picture_name = 'VISITOR' . $user->id . time() . rand(1, 10000) . ".jpg";

        if ($oldPicture != null && File::exists(storage_path($filePath))) {
            File::delete(storage_path($filePath));
        }
        $upload = $file->move(storage_path($path), $new_picture_name);
        if ($upload) {
            $user->update([
                'picture' => $new_picture_name,
//                'image_base64' => $image_base64
            ]);
            return response()->json(['status' => 1, 'msg' => 'Your profile picture has been successfully updated.']);
        } else {
            return response()->json(['status' => 0, 'Something went wrong']);
        }
        }catch (\Exception $e){
            return response()->json(['status' => 0, $e->getMessage()]);
        }
    }

    public function changePassword(Request $req)
    {
        $data = $req->validate([
            'password' => ['required'],
            'new_password' => ['required', 'string'],
            'confirm_new_password' => ['required', 'same:new_password'],
        ], [
            'confirm_new_password.same' => 'Confirm this credentials'
        ]);
        $user = auth()->user();
        $new_password = $data['new_password'];
        $validPassword = Hash::check($new_password, $user->password);
        if ($validPassword) {
            $user = $user->update([
                'password' => $new_password
            ]);
            if ($user) {
                dd('updated');
            }
            dd('not updated');
        }
        session()->flash('error', ' password tidak sesuai');
    }
    public function showProfile(Request $request) {
        return view('front.home.user.profile');
    }
    public function logout(Request $request) {
        auth()->logout();
        $request->session()->flush();
        return to_route('auth');
    }
}
