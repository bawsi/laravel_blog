<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function edit()
    {
    	return view('account.settings');
    }

    public function update()
    {
        // Prevent updating of main admin account
        if (auth()->user()->id == 1) {
            session()->flash('customError', 'Sorry, you cant update admin account in this demo. You are free to update any other accoutns tho.');
            return back();
        }

    	$this->validate(request(), [
    		'name' => 'min:2|max:40',
    		'email' => 'email',
    		'password' => 'min:4|max:40|confirmed|nullable',
    	]);
    	
    	// Filtering out all request values that were not set, so we dont update those
        $dataToUpdate = array_filter(request()->all());
        
        auth()->user()->update($dataToUpdate);

        session()->flash('success', 'User successfully updated');

        return back();
    }
}
