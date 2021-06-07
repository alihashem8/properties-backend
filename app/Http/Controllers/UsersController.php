<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function apiGetById($id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            $user
        ], 200);
    }

    public function apiEdit($id, Request $request)
    {
        $user = User::findOrFail($id);

        $user->email = $request->email;
        $user->name = $request->name;
        $user->phoneNumber = $request->phoneNumber;

        $user->save();

        return response()->json([
            $user
        ], 200);
    }
}
