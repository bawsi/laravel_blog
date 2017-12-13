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
