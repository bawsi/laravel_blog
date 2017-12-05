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
					<div class="column is-one-third">
						<div class="card">
							
							<div class="card-image">
								<figure class="image">
									<img src="{{ $post->thumbnail_path }}" alt="Image">
								</figure>
							</div>

							<div class="card-content">
								<div class="media">
									<div class="media-content">
										<p class="subtitle is-6 m-b-30">
											<span class="fa fa-user-o m-t-2"></span> John Doe 
											<span class="fa fa-folder-open-o m-l-10 m-t-2"></span> {{ $post->category->name }} 
											<span class="fa fa-calendar m-l-10 m-t-2"></span> {{ $post->created_at->toFormattedDateString() }}</p>
										<p class="title is-4">{{ $post->title }}</p>
										<a href="{{ route('posts.show', $post->id) }}" class="button is-info">Read more</a>
									</div>
								</div>
							</div>

						</div>
					</div>
				@endforeach {{-- end of articles --}}

			</div>
			{{-- Pagination links --}}
			<p class="m-t-40">{{ $posts->links() }}</p>
		</div>
	</section>

@endsection