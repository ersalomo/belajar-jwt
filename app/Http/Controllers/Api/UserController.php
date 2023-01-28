<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\{User};

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'status' => 1,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
    public function showUser($id)
    {
        $user_detail = $this->userRepository->getUserById($id);
        return response()->json([
            'succees' => true,
            'data' => $user_detail
        ]);
    }
    public function me()
    {
        return response()->json(auth()->user());
    }

    public function login(Request $req)
    {
        $validate = Validator::make($req->only(['email', 'password']), [
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Kolom ini harus diisi',
            'password.required' => 'Kolom ini harus diisi',
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validate->errors()->toArray(),
            ]);
        } else {
            if (!$token = auth()->attempt($validate->validate())) {
                return response()->json(
                    ['error' => 'This credentials does\'nt match to our records'],
                    401
                );
            }
            return $this->respondWithToken($token);
        }
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            '*' => 'required',
            'email' => 'required|unique:users,email',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->messages()->toArray(),
            ], 422);
        } else {
            $user = User::create($request->all());
            if ($user) {
                return response()->json([
                    'status' => 1,
                    'message' => 'Registered'
                ], 201);
            }
            return response()->json([
                'status' => 3,
                'message' => 'Unregistered',
            ], 505);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            '*' => 'required',
            'email' => 'email',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->messages()->toArray(),
            ], 422);
        } else {
            $user = User::findOrFail($id)->update($request->all());
            if ($user) {
                return response()->json([
                    'status' => 1,
                    'message' => 'Updated'
                ], 201);
            }
            return response()->json([
                'status' => 3,
                'message' => 'Unupdated',
            ], 505);
        }
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
            'status' => 1,
            'message' => 'sucessfully logout'
        ]);
    }
}
