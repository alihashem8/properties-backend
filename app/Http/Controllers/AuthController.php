<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $cred = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($cred)) {
            return response()->json(['error' => 'Error incorrect email/password'], 401);
        }

        return response()->json(['token' => $token]);
    }

    public function register(Request $request)
    {
        $cred = $request->only(['email', 'password', 'name', 'phoneNumber']);
        $user = User::create(array_merge(
            $cred,
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);


    }
}
