@extends('layouts.master')

@section('content')

	<div class="container container-account-edit">
		<h1 class="title">Account Settings</h1>
		<form action="{{ route('account.update') }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}

			<label class="label">Name</label>
			<input class="input" type="text" name="name" value="{{ Auth::user()->name }}">
			<label class="label">Email</label>
			<input class="input" type="text" name="email" value="{{ Auth::user()->email }}">
			<label class="label">Password</label>
			<input class="input" type="password" name="password">
			<label class="label">Password confirmation</label>
			<input class="input" type="password" name="password_confirmation">
			<button class="button is-info is-fullwidth m-t-10" type="submit">Update</button>
		</form>
	</div>

@endsection