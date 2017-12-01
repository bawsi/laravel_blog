<!--Delete modal - with form, where user can select where articles from deleted category are to be moved -->
<div class="modal edit-modal">
	<div class="modal-background animated fadeIn"></div>
	<div class="modal-content animated fadeInDownBig">
		
		<form action="" method="POST">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}
			
			<h1 class="title is-3">Updating an existing user</h1>
			<h6 class="subtitle is-6">Leave fields you dont wish to update, empty.</h6>
			<label for="new-posts-category">New name</label>
			<input class="input" type="text" name="name" minlength="2" maxlength="15" placeholder="Users name here">
			<label for="new-posts-category">New email</label>
			<input class="input" type="email" name="email" minlength="2" maxlength="25" placeholder="Email here">
			<label for="new-posts-category">New role</label>
			
			<select class="select" name="role_id">
				<option selected disabled value>Keep the same</option>
				@foreach($roles as $role)
					<option value="{{ $role->id }}">{{ $role->name }}</option>
				@endforeach
			</select>

			<label for="new-posts-category">New password</label>
			<input class="input" type="password" name="password" minlength="2" maxlength="35" placeholder="Password here">
			<label for="new-posts-category">Password confirmation</label>
			<input class="input" type="password" name="password_confirmation" minlength="2" maxlength="35" placeholder="Password confirmation here">
			<button class="button is-info is-pulled-right" type="submit">Update user</button>
			<button type="button" class="button is-pulled-right close-modal">Cancel</button>
		</form>
	<button class="modal-close is-large"></button>
	</div>
</div>