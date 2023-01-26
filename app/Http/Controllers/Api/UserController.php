<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
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
                'status' => 'fail',
                'messages' => $validate->errors()->toArray(),
            ]);
        }
        return $validate->validate();
        if (!$token = auth()->attempt($validate->validate())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function register(Request $req)
    {
    }
}
