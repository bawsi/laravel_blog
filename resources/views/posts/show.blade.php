@extends('layouts.master')

@section('content')
	
	@component('components.hero')
		@slot('colorClass', 'is-info')
		@slot('sizeClass', 'is-large')
		@slot('backgroundImg', 'http://i.imgur.com/EiQv0CQ.png')
		@slot('title', $post->title)
		@slot('subtitle', 'something here')
	@endcomponent

	<div class="container container-posts-show content"> {{-- content class allows normal usage of lists, blockquotes,... --}}
		<article>
			<p class="body">{!! $post->body !!}</p>
		</article>
	</div>

@endsection

