<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
Use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreatUserRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    
    public function Register(CreatUserRequest $request){

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            return response()->json([
            'status' => 'success',
            'message' => 'Registration successful',
            '$user'=>$user,
            'token'=> $user->createToken('userTaken')->plainTextToken
             ], 201);

        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => 'Something went wrong'], 500);
        }
    }

    public function login(LoginRequest $request){
        
       if(Auth::attempt($request->only('email','password')))
       {
            return response()->json([
                'status' => 'success',
                'message' => 'Login successful',
                '$user'=>Auth::user(),
                'token'=> Auth::user()->createToken('userTaken')->plainTextToken
                ], 201);
        }
        else
        {
            return response()->json(['error' => 'Your email and password are incorrect.'], 401);
        }

       }

}
