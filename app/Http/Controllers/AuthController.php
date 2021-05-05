<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Hash;
use App\User;

class AuthController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:api', ['except' => ['login','register']]);
	}
    public function register(Request $request)
    {

    	$this->validate($request,[
    		'name' => 'required',
    		'email' => 'required|email|unique:users',
    		'password' => 'required',
    		'username' => 'required',
    		'age' => 'required',
    		'phone_number' => 'required',
			'school' => 'required',
			'child_name' => 'required',
			'grade' => 'required'
    	]);
    	$user = new User;

    	$user->name = $request->name;
    	$user->username = $request->username;
    	$user->email = $request->email;
    	$user->password = app('hash')->make($request->password);
    	$user->phone_number = $request->phone_number;
    	$user->age = $request->age;
		$user->child_name = $request->child_name;
		$user->school = $request->school;
		$user->grade = $request->grade;
		
		$user::assignRole('customer');
    	if($user->save())
    	{
    		return response()->json(["message" => "Registrasi Berhasil"],200);
    	}
    	return response()->json(['message' => 'Registrasi Gagal, coba lagi'],400);
        
    }

	public function login(Request $request)
	{
		$this->validate($request,[
			"username" => 'required',
			"password" => 'required'
		]);

		$credentials = request(['username', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Username atau password Salah'], 401);
        }

        return $this->respondWithToken($token);
	}

	public function logout()
	{
		auth()->logout();

		return response()->json(['message' => 'Successfully logged out']);
	}

	/**
  * Request an email verification email to be sent.
  *
  * @param  Request  $request
  * @return Response
  */
  /* public function emailRequestVerification(Request $request)
  {
    if ( $request->user()->hasVerifiedEmail() ) {
        return response()->json('Email address is already verified.');
    }
    
    $request->user()->sendEmailVerificationNotification();
    
    return response()->json('Email request verification sent to ');
  } */
/**
  * Verify an email using email and token from email.
  *
  * @param  Request  $request
  * @return Response
  */
  /* public function emailVerify(Request $request)
  {
    $this->validate($request, [
      'token' => 'required|string',
    ]);
\Tymon\JWTAuth\Facades\JWTAuth::getToken();
    \Tymon\JWTAuth\Facades\JWTAuth::parseToken()->authenticate();
if ( ! $request->user() ) {
        return response()->json('Invalid token', 401);
    }
    
    if ( $request->user()->hasVerifiedEmail() ) {
        return response()->json('Email address '.$request->user()->getEmailForVerification().' is already verified.');
    }
$request->user()->markEmailAsVerified();
return response()->json('Email address '. $request->user()->email.' successfully verified.');
  } */
}
