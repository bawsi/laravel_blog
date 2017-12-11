<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display an index of all roles
     */
    public function index()
    {
    	$roles = Role::orderBy('id')->get();

    	return view('roles.index')->with(compact('roles'));
    }

    /**
     * Store new role record to db
     */
    public function store()
    {
    	$this->validate(request(), [
    		'role-name' => 'min:2|max:25|unique:roles,name'
    	]);

    	Role::create([
    		'name' => request('name')
    	]);

    	request()->flash('success', 'New role successfully created');

    	return back();
    }	

    /**
     * Update existing role name
     */
    public function update(Role $role)
    {
        $this->validate(request(), [
            'role-name' => 'min:2|max:25'
        ]);      

       $role->update([
            'name' => request('role-name'),
        ]);

       session()->flash('success', 'Role name updated successfully');

       return back();
    }

    /**
     * Update users which have same roles, as ones we are deleting, and then delete the role
     */
    public function destroy(Role $role)
    {
        $this->validate(request(), [
            'new-role-id' => 'exists:roles,id',
        ]);

        // Updating category_id on posts
        User::where('role_id', $role->id)->update(['role_id' => request('new-role-id')]);

        $role->delete();

        session()->flash('success', 'Role "' . $role->name . '" successfully deleted, and all of its users received new roles.');

        return back();
    }
}
