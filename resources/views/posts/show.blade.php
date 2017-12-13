@extends('layouts.master')

@section('content')
	<div class="container-posts-show content">
		
		@component('components.hero')
			@slot('colorClass', 'is-info')
			@slot('sizeClass', 'is-medium') 
			@slot('backgroundImg', $post->header_path ?? '')
			@slot('title', $post->title)
			@slot('subtitle', 'Author: ' . $post->user->name . ' | Category: ' . $post->category->name . ' | Published On: ' . $post->created_at->toFormattedDateString())
		@endcomponent

		<div class="container "> {{-- content class allows normal usage of lists, blockquotes,... --}}
			<article>
				
				{{-- Edit and delete buttons --}}
				@if (Auth::check())
					@if ($post->user_id == Auth::user()->id || Auth::user()->role_id == 1)
						<div class="buttons">
							<a href="{{ route('posts.edit', $post->id) }}" class="button is-info m-t-10" type="submit"><span class="fa fa-pencil-square-o m-r-5"></span> Edit Article</a>
							<a href="{{ route('posts.destroy', $post->id) }}" class="button is-danger m-t-10" type="submit"><span class="fa fa-trash-o m-r-5"></span> Delete Article</a>
						</div>
					@endif
				@endif

				<p class="body">{!! $post->body !!}</p>
			</article>
		</div>
	</div>

@endsection

