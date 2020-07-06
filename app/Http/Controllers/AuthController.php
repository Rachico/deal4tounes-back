<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
/*
    public function register(Request $request) ////// => register() method is the store() method in ClientController
    {
        $validatedData =$request ->validate ([

            'name'=>'required|max:55' ,
            'email'=>'email|required|unique:users',
            'password'=> 'required',
        ]);

        $validatedData['password']= bcrypt($request->password);

        $user = User::create($validatedData);
        $accessToken=$user->createToken('authToken')->accessToken;
        return response ([
            'user'=>$user,
            'access_token'=>$accessToken,
            'message' => 'Successfully created user!'
        ]);

    }
    */

////////////////////// LOGIN METHOD //////////////////////////////////////////////////

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);


        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();


        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'message'=>'Successfully logged in',
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    /////////////////////// LOG OUT METHOD /////////////////////////////////////////////

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /////////////////////// get USER METHOD //////////////////////////////////////////
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

/////////////////////// THE CHANGE PASSWORD METHOD //////////////////////////////////////////
    public function store(Request $request)
    {
        $request->validate([
            'password' => ['required'],
            'password_confirmation' => ['same:password'],
        ]);

        if (User::find($request->id)->update(['password' => Hash::make($request->password_confirmation)])) {
            return response()->json([
                'message' => 'success'
            ], 200);
        }

        return response()->json([
            'message' => 'Error on changing password'
        ], 500);


    }




}
