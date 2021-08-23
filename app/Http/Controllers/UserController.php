<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
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
		
    	if($user->save())
    	{
    		return redirect('user')->with('message-success', 'Sukses menambah user');
    	}
        return redirect('user')->with('message-fail', 'Gagal menambah user');
    }
}
