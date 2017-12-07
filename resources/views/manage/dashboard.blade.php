@extends('layouts.manage')

@section('content')

	<h1 class="title is-2">Your account statistics</h1>

	<div class="columns">

		<div class="column">
			<div class="panel">
				<p class="panel-heading">Logged in as</p>
				<div class="panel-block">
					<p>{{ auth()->user()->name }}</p>
				</div>
			</div>

			<div class="panel">
				<p class="panel-heading">Your role is</p>
				<div class="panel-block">
					<p>{{ auth()->user()->role->name }}</p>
				</div>
			</div>
		</div>
		
		<div class="column">
			<div class="panel">
				<p class="panel-heading">Your account was created on</p>
				<div class="panel-block">
					<p>{{ auth()->user()->created_at->toFormattedDateString() }}</p>
				</div>
			</div>

			<div class="panel">
				<p class="panel-heading">Total articles by you</p>
				<div class="panel-block">
					<p>{{ auth()->user()->posts->count() }}</p>
				</div>
			</div>
		</div>

	
		<div class="column">
			<div class="panel">
				<p class="panel-heading">Your latest article published on</p>
				<div class="panel-block">
					<p>{{ auth()->user()->posts->first()->created_at->toFormattedDateString() }}</p>
				</div>
			</div>

			<div class="panel">
				<p class="panel-heading">Your most active category</p>
				<div class="panel-block">
					<p>{{ auth()->user()->posts->first()->created_at->toFormattedDateString() }}</p>
				</div>
			</div>
		</div>
	</div>






@endsection