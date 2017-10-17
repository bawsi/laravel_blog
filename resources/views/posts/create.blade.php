@extends('layouts.manage')

@section('content')

	<div class="container-posts-create">
		<h1 class="title is-3">Publish new post</h1>
		
		<form action="{{ route('posts.store') }}" method="POST">
			{{ csrf_field() }}

			<label for="title">Post title</label>
			<input class="input" type="text" name="title" placeholder="Post title here" value="{{ old('title') }}">
			<label for="category">Category</label>
			<select class="select" id="category" name="category">
				@foreach($categories as $category)
					<option {{ (old('category') == $category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
			<label for="body">Post body</label>
			<textarea id="article-body" class="textarea" name="body">{{ old('body') }}</textarea>

			<button class="button is-info m-t-10 is-fullwidth" type="submit">Publish <span class="fa fa-arrow-right"></span></button>
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