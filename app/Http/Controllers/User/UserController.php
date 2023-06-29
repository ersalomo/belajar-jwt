<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{File, Validator, Hash, Storage};
use Maatwebsite\Excel\Facades\Excel;
use App\Models\{User, Visitor};
use App\Exports\UsersExport;

class UserController extends Controller
{
    public function exportUsers()
    {
        return Excel::download(new  UsersExport, 'user-data.xlsx');
    }

    public function index()
    {
    }

    public function get_visitors(Request $request)
    {
        $visitors = Visitor::limit(50)
            ->get(['id', 'firstname', 'lastname', 'email', 'picture']);
        return response()->json([
            'status' => 'success',
            'data' => $visitors
        ], 200);
    }

    public function changeProfile(Request $request)
    {

        $user = auth()->user();
        try {
//            $path = "app/public/users/";
//            $file = $request->file('file');
//            $oldPicture = get_name_image($user->detail["picture"]);
//            $filePath = 'app\public\users\\' . $oldPicture;
//            $new_picture_name = 'VISITOR' . $user->id . time() . rand(1, 10000) . ".jpg";

//            if ($oldPicture != null && File::exists((storage_path($filePath)))) {
//                Storage::delete($path.$oldPicture);
//                File::delete(storage_path(storage_path($path . $oldPicture)));
//            }
//
//            $upload = $file->move(storage_path($path), $new_picture_name);
            $image_name = upload_image($user->detail["picture"], $request->file('file'));
            if ($image_name) {
                $user->detail()->update([
                    'picture' => $image_name,
                ]);
                return response()->json(['status' => 1, 'msg' => 'Your profile picture has been successfully updated.']);
            } else {
                return response()->json(['status' => 0, 'Something went wrong']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 0, $e->getMessage()]);
        }
    }


    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->flush();
        return to_route('auth');
    }
}
