<!-- Delete modal - with form, where user can select where articles from deleted category are to be moved -->
<div class="modal delete-modal">
	<div class="modal-background animated fadeIn"></div>
	<div class="modal-content animated fadeInUpBig">
		
		<form action="" method="POST">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<h1 class="title is-5">Delete a user & move his posts</h1>
			<hr>
			<label for="new-posts-category">Select where to move all posts from user you are deleting:</label>
			<select class="select is-normal" type="text" name="new-category-id">
				@foreach ($users as $user)
					<option value="{{ $user->id }}">{{ $user->name . ' (' . $user->email . ')' }}</option>
				@endforeach
			</select>
			<button class="button is-danger is-pulled-right" type="submit">Move & Delete</button>
			<button class="button is-pulled-right close-modal" type="button">Cancel</button>
		</form>
		<button class="modal-close is-large"></button>
	</div>
</div>