<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{	
	/**
	 * Homepage
	 */
	public function index()
	{
		$posts = Post::latest()->paginate(9, ['*'], 'p');

		return view('pages.home')->with(compact('posts'));
	}

	/**
	 * Show single post
	 */
	public function show(Post $post)
	{
		return view('posts.show')->with(compact('post'));
	}

	/**
	 * Show new post form
	 */
	public function create()
	{
		return view('posts.create');
	}

	/**
	 * Store newly created post
	 */
	public function store()
	{
		$this->validate(request(), [
			'title' => 'min:2|max:100',
			'body'  => 'min:30'
		]);

		$post = Post::create([
			'title' => request('title'),
			'body'  => request('body'),
			'user_id' => 1,
			'category_id' => 1,
		]);

		return redirect()->route('posts.show', $post->id);
	}

	/**
	 * Show edit post form
	 */
	public function edit(Post $post)
	{
		return view('posts.edit')->with(compact('post'));
	}

	/**
	 * Update post
	 */
	public function update(Post $post)
	{
		$this->validate(request(), [
			'title' => 'min:2|max:100',
			'body'  => 'min:30'
		]);

		$post->update([
			'title' => request('title'),
			'body'  => request('body')
		]);

		session()->flash('success', 'Post successfully updated.');
		return redirect()->route('posts.show', $post->id);
	}



}
