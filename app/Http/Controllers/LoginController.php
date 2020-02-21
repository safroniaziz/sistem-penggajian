<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
    	$username = $request->username;
    	$password = $request->password;
    	if(Auth::attempt(array('username'   =>  $username, 'password'  =>  $password)))
        {
            Session::put('login',TRUE);
            Session::put('nama',Auth::guard()->user()->nm_operator);
        	return redirect()->route('admin.dashboard');
        }
        else
        {
        	return redirect()->route('login-admin');
        }
    }

    public function logout()
    {
    	Session::flush();
    	return redirect()->route('login-admin');
    }
}
