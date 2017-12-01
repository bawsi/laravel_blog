@extends('layouts.manage')

@section('content')
	<div class="container-users-index">
		<h1 class="title is-2">Users index</h1>
		<button class="button is-success is-pulled-right new-user-btn"><span class="fa fa-plus-square-o"></span> New User</button>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Total articles</th>
				<th>Latest article</th>
				<th>Options</th>
			</thead>
			<tbody>

				@foreach($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->role->name }}</td>
						<td>{{ $user->posts->count() }}</td>
						
						<td>
							{!! isset($user->posts->last()->title) ? 
							'<a href="' . route('posts.show', $user->posts->last()->id) .'">' . substr($user->posts->last()->title, 0, 15) . '...</a>' : 
							'No posts yet' !!}
						</td>
						
						<td>
							<button class="button is-info is-small edit-btn"><span class="fa fa-pencil-square-o"></span></button>
							<button type="button" class="button is-danger is-small delete-btn"><span class="fa fa-trash-o"></span></a>
						</td>
					</tr>
				@endforeach
				
			</tbody>
		</table>
		@include('users.partials.new-user-modal')
		@include('users.partials.edit-user-modal')
		@include('users.partials.delete-user-modal')
	</div>

	@section('scripts')
		@include('users.partials.scripts')
	@endsection

@endsection