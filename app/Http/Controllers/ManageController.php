<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index()
    {
    	return redirect()->route('manage.dashboard');
    }

    public function dashboard()
    {
    	$mostActiveCategoryId = auth()->user()->posts->groupBy('category_id')->max()->first()->category_id;
    	$categoryName = Category::find($mostActiveCategoryId)->name;

    	return view('manage.dashboard')->with(compact('categoryName'));
    }
}
