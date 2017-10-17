@extends('layouts.manage')

@section('content')

	<div class="container-roles-index">
		<h1 class="title is-2">Roles index</h1>
		<button class="button is-success is-pulled-right new-role-btn"><span class="fa fa-plus-square-o"></span> New Role</button>
		<table class="table">
			<thead>
				<th>id</th>
				<th>Role</th>
				<th>Total users</th>
				<th>Options</th>
			</thead>
			<tbody>

				@foreach ($roles as $role)
				<tr>
					<td>{{ $role->id }}</td>
					<td>{{ $role->name }}</td>
					<td>{{ $role->users->count() }}</td>
					<td>
						<button class="button is-info is-small edit-btn"><span class="fa fa-pencil-square-o"></span></button>
						<button type="button" class="button is-danger is-small delete-btn"><span class="fa fa-trash-o"></span></a>
					</td>
				</tr>
				@endforeach

			</tbody>
		</table>
		@include('roles.partials.new-role-modal')
		@include('roles.partials.delete-role-modal')
	</div>

	@section('scripts')
		@include('roles.partials.scripts')
	@endsection

@endsection