@extends('layouts.manage')

@section('content')

	<div class="container-categories-index">
		<h1 class="title is-2">Categories index</h1>
		<button class="button is-success is-pulled-right new-category-btn new-category"><span class="fa fa-plus-square-o"></span> New Category</button>
			
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Name</th>
				<th>Total Posts</th>
				<th>Options</th>
			</thead>
			<tbody>

				@foreach($categories as $category)
					<tr>
						<th>{{ $category->id }}</th>
						<td>{{ $category->name }}</td>
						<td>{{ $category->posts->count() }}</td>
						<td>
							<button class="button is-info is-small edit-btn"><span class="fa fa-pencil-square-o"></span></button>
							<button type="button" class="button is-danger is-small delete-btn"><span class="fa fa-trash-o"></span></a>
						</td>
					</tr>
				@endforeach
				
			</tbody>	
		</table>

		@include('categories.partials.delete-modal')
		@include('categories.partials.create-modal')

	</div>

	@section('scripts')
		@include('categories.partials.scripts')
	@endsection

@endsection