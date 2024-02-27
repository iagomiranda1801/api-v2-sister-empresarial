<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)    
    {

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(["errors" => __('auth.failed')],422);
        }

        return response()->json(['token' => $user->createToken($user->id)->plainTextToken, 'type' => 'Bearer','user' => $user]);
    }
    
}
