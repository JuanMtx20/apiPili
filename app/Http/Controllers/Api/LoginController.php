<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $this->validateLogin($request);

        if(Auth::attempt( $request->only('email', 'password')) ){
            $user = Auth::user();
            // $user = Auth::guard('user')->user();

            return response()->json([
                'token'   => $request->user()->createToken($request->name)->plainTextToken,
                'message' => 'auth succeess',
                'name'    => $user->name,
                'roles'    => $user->roles
            ]);
        }

        return response()->json([
            'message' => 'Incorrect username or password.'
        ], 401);
    }

    public function validateLogin($request){
        return $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
            'name'    => 'required',
        ]);
    }
}
