@extends('layouts.master')

@section('content')
	{{-- Articles --}}
	<section>
		<div class="container m-t-10">
			<h1 class="title is-3 m-t-25">{!! $posts->count() ? 'Latest posts in <b>' . $category->name . '</b> category' : 'No posts yet published in <b>' . $category->name  . '</b> category' !!}</h1>
			<hr>
			<div class="columns is-multiline">
				
				{{-- showing all articles (paginated) --}}
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