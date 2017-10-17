<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Show an index of all users
     */
    public function index()
    {
    	$users = User::orderBy('created_at')->with('posts')->get();
        $roles = Role::orderBy('id')->get();

    	return view('users.index')->with(compact('users', 'roles'));
    }

    /**
     * Store new user to db
     */
    public function store()
    {
    	$this->validate(request(), [
    		'name' => 'min:2|max:40',
    		'email' => 'email|unique:users,email',
    		'password' => 'min:4|max:40|confirmed',
    	]);

    	User::create([
    		'name' => request('name'),
    		'email' => request('email'), 
    		'password' => bcrypt(request('password'))
    	]);

    	session()->flash('success', 'User successfully created.');

    	return back();
    }	

    /**
     * Update user
     */
    public function update(User $user)
        {
            $this->validate(request(), [
                'name' => 'nullable|min:2|max:40',
                'email' => 'nullable|email|unique:users,email',
                'password' => 'nullable|min:4|max:40|confirmed',
                'role-id'  => 'nullable|exists:roles,id'
            ]);

            // Filtering out all request values that were not set, so we dont update those
            $dataToUpdate = array_filter(request()->all());

            $user->update($dataToUpdate);

            session()->flash('success', 'User successfully updated');

            return back();
            
        }    

    /**
     * Delete a user
     */
    public function destroy(User $user)
    {
        $this->validate(request(), [
            'new-user-id' => 'exists:users,id',
        ]);

       // Updating user_id on posts
        $posts = Post::where('user_id', $user->id)->update(['user_id' => request('new-user-id')]);
        
        $user->delete();

        session()->flash('success', 'User successfully deleted');

        return back();
    }
}
