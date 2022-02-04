<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserContrller extends Controller
{
    //
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',

        ]);
        $user=User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
        ]);

        $token=$user->createToken('maketoken')->plainTextToken;
        return response([
'user'=>$user,
'token'=>$token,
        ],201);
    }  
    public function logout(){
        auth()->user()->tokens()->delete();
        return response([
        'message'=>'successfully Logout !!',
        ]);
    }
    public function login(Request $request){
         $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
       $user=User::where('email',$request->email)->first();
        if (!$user|| !Hash::check($request->password,$user->password)) {
            return response([
                'message'=>'The Providing crendentials are incorrect'
            ],401);
        }
        $token=$user->createToken('myToken')->plainTextToken;
        return response([
                'user'=>$user,
                'token'=>$token,
        ],201);
    }
}
