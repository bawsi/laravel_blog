<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Homepage
     */
    public function index()
    {
        $posts = Post::latest()->with('category')->get();

        return view('posts.index')->with(compact('posts'));
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
        $categories = Category::orderBy('id')->get();

        return view('posts.create')->with(compact('categories'));
    }

    /**
     * Store newly created post
     */
    public function store()
    {
        $this->validate(request(), [
            'title'    => 'min:2|max:100',
            'body'     => 'min:30',
            'category' => 'exists:categories,id',
        ]);

        $post = Post::create([
            'title'       => request('title'),
            'body'        => request('body'),
            'user_id'     => auth()->user()->id,
            'category_id' => request('category'),
        ]);

        session()->flash('success', 'Post successfully published');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Show edit post form
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('id')->get();

        return view('posts.edit')->with(compact('post', 'categories'));
    }

    /**
     * Update post
     */
    public function update(Post $post)
    {
        $this->validate(request(), [
            'title'    => 'min:2|max:100',
            'body'     => 'min:30',
            'category' => 'exists:categories,id',
        ]);

        $post->update([
            'title'    => request('title'),
            'body'     => request('body'),
            'category_id' => request('category'),
        ]);

        session()->flash('success', 'Post with ID of ' . $post->id . ' successfully updated.');

        return redirect()->route('posts.index');
    }

    /**
     * Delete post
     */
    public function destroy()
    {
        $post = Post::find(request('id'));
        $post->delete();

        session()->flash('success', 'Post with id of ' . request()->id . ' successfully deleted');

        return back();
    }
}
