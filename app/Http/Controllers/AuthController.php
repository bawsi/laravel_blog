<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
	// Where user is redirected, when logged in
	protected $redirectTo = '/manage/dashboard';

	/**
	 * Adding middleware
	 */
	public function __construct()
	{
		$this->middleware('auth')->only(['logout']);
	}

	/**
	 * Show login form
	 */
    public function showLogin()
    {
    	return view('auth.login');
    }

    /**
     * Log a user in, by his email and password
     */
    public function login()
    {
        $loggedIn = auth()->attempt(['email' => request('email'), 'password' => request('password')]);

    	if ($loggedIn) {
    		return redirect()->route('manage.dashboard');
    	} else {
    		return redirect()->route('auth.showLogin')->withErrors(['error' => 'Failed to login... Please try again.']);
    	}
    }

    /**
     * Log a logged in user, out
     */
    public function logout()
    {
    	auth()->logout();
    	
    	return redirect('/');
    }
}
