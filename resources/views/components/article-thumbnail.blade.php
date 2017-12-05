<div class="column is-one-third">
	<div class="card">
		
		{{-- Thumbnail img --}}
		<div class="card-image">
			<figure class="image">
				<img src="{!! $thumbnailPath !!}" alt="Image">
			</figure>
		</div>
		
		{{-- thumbnail text content --}}
		<div class="card-content">
			<div class="media">
				<div class="media-content">
					
					<p class="subtitle is-6 m-b-30">
						<span class="fa fa-user-o m-t-2"></span> {!! $userName !!}
						<span class="fa fa-folder-open-o m-l-10 m-t-2"></span> {!! $categoryName !!} 
						<span class="fa fa-calendar m-l-10 m-t-2"></span> {!! $createdAt !!}
					</p>

					<p class="title is-4">{!! $postTitle !!}</p>
					<a href="{!! $linkTo !!}" class="button is-info">Read more</a>

				</div>
			</div>
		</div>

	</div>
</div>