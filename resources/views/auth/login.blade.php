@extends('layouts.master')

@section('content')

	<div class="container">
		<form action="{{ route('auth.login') }}" method="POST">
			{{ csrf_field() }}

			<label class="label">Email</label>
			<input class="input" type="email" name="email" placeholder="Email here">
			<label class="label">Password</label>
			<input class="input" type="password" name="password" placeholder="Password here">
			<button class="button is-info" type="submit">Login</button>
		</form>
	</div>

{{ bcrypt("12345") }}	

@endsection