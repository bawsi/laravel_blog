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
    	$mostActiveCategoryId = auth()->user()->posts->count() ? auth()->user()->posts->groupBy('category_id')->max()->first()->category_id : 0;
    	
        $categoryName = $mostActiveCategoryId ? Category::find($mostActiveCategoryId)->name : 'None yet';
        $latestArticleCreatedAt = auth()->user()->posts->count() ? auth()->user()->posts->first()->created_at->toFormattedDateString() : 'No article yet published';

    	return view('manage.dashboard')->with(compact('categoryName', 'latestArticleCreatedAt'));
    }
}
