@extends('layouts.master')

@section('content')

	<div class="container login-container">
			<h1 class="title">Login</h1>
			<p><strong>Email:</strong> admin@example.com <strong>Password:</strong> 12345</p>
			<hr>
		<form action="{{ route('auth.login') }}" method="POST">
			{{ csrf_field() }}
			<label class="label">Email</label>
			<input class="input" type="email" name="email" placeholder="Email here">
			<label class="label" id="passLabel">Password</label>
			<input class="input" type="password" name="password" placeholder="Password here">
			<button class="button is-info is-fullwidth" type="submit">Login</button>
		</form>
			
	</div>

@endsection