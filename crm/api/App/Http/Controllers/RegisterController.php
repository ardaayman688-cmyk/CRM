<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller
{
    public function register(Request $request){
    $validator=validator::make($request->all(),[
        'name'=>'required|string|max:255',
        'email'=>'required|email|max:255|unique:users,email',
        'password'=>'required|string|min:8',
        'confirm_password'=>'required|same:password',

    ]);
    if ($validator->fails()){
        return response()->json([
            'message'=>'Validator failed',
            'errors'=>$validator->errors()
        ],422);
    }
    $user=User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
    ]);
   $token = $user->createToken('customer-token')->accessToken;
    return response()->json([
    'message'=>'Customer registered successfully',
    'user'=>$user,
    'token'=>$token,
    ],201);
    }
    public function login(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'message' => 'Validation failed',
            'errors' => $validator->errors(),
        ], 422);
    }

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Invalid email or password',
        ], 401);
    }

    $token = $user->createToken('customer-token')->accessToken;

    return response()->json([
        'message' => 'Login successful',
        'user' => $user,
        'token' => $token,
    ], 200);
}
}
