<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
	{
		$posts = Post::latest()->with('category')->paginate(9, ['*'], 'p');

		return view('pages.home')->with(compact('posts'));
	}
}
