<?php

namespace App\Http\Controllers;

use File;
use Image;
use App\Post;
use Storage;
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

        // If article thumbnail image was uploaded, store it, else, set path to NULL
        if (request()->hasFile('img_thumbnail')) {
            
            // setting file path and image name, then saving it
            $thumbnailPath = 'article_thumbnails/' . time() . '_' . str_random(15) . '.' . request()->img_thumbnail->getClientOriginalExtension();
            Storage::disk('uploads')->put($thumbnailPath, file_get_contents(request()->img_thumbnail));

            // Resizing image to fit better
            $img = Image::make('uploads/' . $thumbnailPath);
            $img->fit(450, 200);
            $img->save();
        }

        // If article header image was uploaded, store it, else, set path to NULL
        if (request()->hasFile('img_header')) {
            
            $headerPath = 'article_headers/' . time() . '_' . str_random(15) . '.' . request()->img_header->getClientOriginalExtension();
            Storage::disk('uploads')->put($headerPath, file_get_contents(request()->img_header));
        }

        // Storing post to db
        $post = Post::create([
            'title'          => request('title'),
            'body'           => request('body'),
            'thumbnail_path' => isset($thumbnailPath) ? '/uploads/' . $thumbnailPath : null,
            'header_path'    => isset($headerPath) ? '/uploads/' . $headerPath : null,
            'user_id'        => auth()->id(),
            'category_id'    => request('category'),
        ]);

        session()->flash('success', 'Post successfully published');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Show edit post form
     */
    public function edit(Post $post)
    {
        // If admin or post author, go to edit page
        if (auth()->user()->id == 1 || auth()->user()->id == $post->user_id) {
            $categories = Category::orderBy('id')->get();
            return view('posts.edit')->with(compact('post', 'categories'));
        }

        // Else, redirect to dashboard with error
        return redirect()->route('manage.dashboard')->withErrors(['You do not have access to that page!']);
       
    }

    /**
     * Update post
     */
    public function update(Post $post)
    {
        // If admin or post author, update post
        if (auth()->user()->id == 1 || auth()->user()->id == $post->user_id) {
            $this->validate(request(), [
            'title'    => 'min:2|max:100',
            'body'     => 'min:30',
            'category' => 'exists:categories,id',
            ]);

            // If new thumbnail image was uploaded, delete old one, upload and resize new one
            if (request()->hasFile('img_thumbnail')) {
                // Deleting old thumbnail img
                File::delete(public_path($post->thumbnail_path));

                // setting file path and image name, then saving it
                $thumbnailPath = 'article_thumbnails/' . time() . '_' . auth()->id() . '_' . str_random(15) . '.' . request()->img_thumbnail->getClientOriginalExtension();
                Storage::disk('uploads')->put($thumbnailPath, file_get_contents(request()->img_thumbnail));

                // Resizing image to fit better
                $thumbnail_path = Image::make('uploads/' . $thumbnailPath);
                $thumbnail_path->fit(450, 200);
                $thumbnail_path->save();
            }

            // If new header image was uploaded, delete old one, upload new one
            if (request()->hasFile('img_header')) {
                // Deleting old  header img
                File::delete(public_path($post->header_path));

                // setting file path and image name, then saving it
                $headerPath = 'article_headers/' . time() . '_' . auth()->id() . '_' . str_random(15) . '.' . request()->img_header->getClientOriginalExtension();
                Storage::disk('uploads')->put($headerPath, file_get_contents(request()->img_header));
            }


            $post->update([
                'title'          => request('title'),
                'body'           => request('body'),
                'category_id'    => request('category'),
                'thumbnail_path' => isset($thumbnailPath) ? '/uploads/' . $thumbnailPath : $post->img_thumbnail,
                'header_path'    => isset($headerPath) ? '/uploads/' . $headerPath : $post->img_header,
            ]);

            session()->flash('success', 'Post with ID of ' . $post->id . ' successfully updated.');

            return redirect()->route('posts.index');
        }

        // Else, redirect to dashboard with error
        return redirect()->route('manage.dashboard')->withErrors(['You do not have access to that page!']);
    }

    /**
     * Delete post
     */
    public function destroy()
    {
        $post = Post::find(request('id'));

        // If admin or post author, delete post and all images associated with it
        if (auth()->user()->id == 1 || auth()->user()->id == $post->user_id) {
            $post->delete();

            // Deleting thumbnail image of post (Storage::delete() didnt work for some reason, File did)
            File::delete(public_path($post->thumbnail_path));

            // Deleting header image of post 
            File::delete(public_path($post->header_path));

            session()->flash('success', 'Post with id of ' . request()->id . ' successfully deleted');

            return back();
        }

        // Else, redirect to dashboard with error
        return redirect()->route('manage.dashboard')->withErrors(['You do not have access to that page!']);
    }
}
