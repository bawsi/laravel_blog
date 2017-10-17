{{-- Delete modal - with form, where user can select where articles from deleted category are to be moved --}}
<div class="modal delete-modal">
	<div class="modal-background animated fadeIn"></div>
	<div class="modal-content animated fadeInUpBig">
		
		<form action="" method="POST">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<h1 class="title is-5">Move & delete</h1>
			<label for="new-posts-category">Select where to move all posts from category you are deleting:</label>
			<select class="select is-normal" type="text" name="new-category-id">
				@foreach ($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
			<button class="button is-danger is-pulled-right" type="submit">Move & Delete</button>
			<button class="button is-pulled-right close-modal" type="button">Cancel</button>
		</form>
		<button class="modal-close is-large"></button>
	</div>
</div>