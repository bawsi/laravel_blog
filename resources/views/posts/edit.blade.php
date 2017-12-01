@extends('layouts.manage')

@section('content')

	<div class="container-posts-edit">
		<h1 class="title is-3">Edit post</h1>
		
		<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}

			<label for="title">Post title</label>
			<input class="input" type="text" name="title" placeholder="Post title here" value="{{ $post->title }}">
			<label for="title">Category</label>
			
			<select id="category" class="select" name="category">
				@foreach($categories as $category)
					<option {{ ($post->category->id == $category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>

			<label for="img">Article thumbnail image (Preferrable size 450x200. Will be cropped and resized otherwise)</label>
			<input type="file" name="img_thumbnail" class="input" value="{{ old('img') }}">
			
			<label for="img">Article header image (Preferrable size 2560x460)</label>
			<input type="file" name="img_header" class="input" value="{{ old('img_header') }}">

			<label for="body">Post body</label>
			<textarea id="article-body" class="textarea" name="body">{{ $post->body }}</textarea>

			<button class="button is-info m-t-10 is-fullwidth" type="submit">Update <span class="fa fa-arrow-right"></span></button>
		</form>

	</div>

	@section('scripts')
		{{-- Adding CKEditor --}}
		<script src="//cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
		<script>CKEDITOR.replace('article-body');</script>
		{{-- ckeditor doesnt always update textarea - this forces it to do so --}}
		<script>
			$('textarea#article-body').each(function() {
			    var name = $(this).attr('name');
			    CKEDITOR.instances[name].updateElement();
			});
		</script>
	@endsection

@endsection