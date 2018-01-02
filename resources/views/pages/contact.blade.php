@extends('layouts.master')

@section('content')
	
	<div class="contact-form">
		<h1 class="title">Contact me</h1>
		<hr>

		<form action="{{ route('pages.postContact') }}" method="POST">
			{{ csrf_field() }}
			<label for="name" class="label">Name</label>
			<input type="text" name="name" id="name" class="input">
			<label for="email" class="label">Email</label>
			<input type="text" name="email" id="email" class="input">
			<label for="subject" class="label">Message subject</label>
			<input type="text" name="subject" id="subject" class="input">
			<label for="msgBody" class="label">Your message</label>
			<textarea name="msgBody" id="msgBody" cols="30" rows="10" class="textarea"></textarea>
			<button class="button is-info m-t-10 is-fullwidth" type="submit">Send <span class="fa fa-arrow-right"></span></button>
		</form>
	</div>

@endsection