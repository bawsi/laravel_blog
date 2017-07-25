@extends('layouts.master')

@section('content')

	<div class="container container-posts-create">

		<form action="/posts" method="POST">
			{{ csrf_field() }}
			<h1 class="title is-3">Publish new article</h1>
			<label for="title">Post title</label>
			<input class="input" type="text" name="title" placeholder="Post title here">
			<label for="body">Post body</label>
			<textarea id="article-body" class="textarea" name="body"></textarea>

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