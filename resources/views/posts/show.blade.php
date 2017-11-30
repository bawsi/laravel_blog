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
				<p class="body">{!! $post->body !!}</p>
			</article>
		</div>
	</div>

@endsection

