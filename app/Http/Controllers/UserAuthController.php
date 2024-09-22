<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function login(Request $request){

        if($request->email == 'admin@gmail.com'){
            return response()->json([
                'message' => 'unauthorized'
            ],401);
        }

        $loginUserData = $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|min:8',
            'remember_me' => 'boolean'
        ]);

        $user = User::where('email',$loginUserData['email'])->first();
        if(!$user || !Hash::check($loginUserData['password'],$user->password)){

            return response()->json([
                'message' => 'Invalid Credentials'
            ],401);
        }

        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;

        return response()->json([
            'access_token' => $token,
        ]);
    }


    public function logout(){
        auth()->user()->tokens()->delete();

        return response()->json([
          "message"=>"logged out"
        ]);
    }
}
