@extends('layouts.master')

@section('content')

	@component('components.hero')
		@slot('colorClass', 'is-info')
		@slot('title', 'Welcome to SomeGenericBlog!')
		@slot('subtitle', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, soluta.')
	@endcomponent

	{{-- Content --}}
	<section>
		<div class="container m-t-10">
			<h1 class="title is-3 m-t-25">Latest Articles</h1>
			<hr>
			<div class="columns is-multiline">
				
				{{-- Articles --}}
				@foreach($posts as $post)
					@component('components.article-thumbnail')
						@slot('thumbnailPath', $post->thumbnail_path)
						@slot('userName', $post->user->name)
						@slot('categoryName', $post->category->name)
						@slot('createdAt', $post->created_at->toFormattedDateString())
						@slot('postTitle', $post->title)
						@slot('linkTo', route('posts.show', $post->id))
					@endcomponent
				@endforeach {{-- end of articles --}}

			</div>
			{{-- Pagination links --}}
			<p class="m-t-40">{{ $posts->links() }}</p>
		</div>
	</section>

@endsection