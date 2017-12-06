<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use Illuminate\contract\Mailer;

class PagesController extends Controller
{
	// Get all posts and show home page
    public function getHome()
	{
		$posts = Post::latest()->with('category')->paginate(9, ['*'], 'p');

		return view('pages.home')->with(compact('posts'));
	}

	// Show contact page
	public function getContact()
	{
		return view('pages.contact');
	}

	public function postContact(Request $request)
	{
		$this->validate($request, [
			'name' => 'min:2|max:20|regex:/^[a-zA-Z\s)]+$/',
			'email' => 'email',
			'subject' => 'min:5|max:100',
			'body:' => 'min:10|max:2000'
		]);

		// Sending email to my own email adress, with details they entered in contact form
		Mail::send(new Contact($request->name, $request->email, $request->subject, $request->msgBody));

		return view('pages.contact');
	}
}
