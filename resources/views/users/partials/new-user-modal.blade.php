{{-- Delete modal - with form, where user can select where articles from deleted category are to be moved --}}
<div class="modal create-modal">
	<div class="modal-background animated fadeIn"></div>
	<div class="modal-content animated fadeInDownBig">
		
		<form action="{{ route('users.store') }}" method="POST">
			{{ csrf_field() }}
			<h1 class="title is-5">Creating new user</h1>
			<label for="new-posts-category">Users name</label>
			<input class="input" type="text" name="name" required="required" minlength="2" maxlength="15" placeholder="Users name here">
			<label for="new-posts-category">Email</label>
			<input class="input" type="email" name="email" required="required" minlength="2" maxlength="25" placeholder="Email here">
			<label for="new-posts-category">Email</label>
			<select class="input" name="role-id" id="role-id">
				@foreach(App\Role::all() as $role)
					<option value="{{ $role->id }}">{{ $role->name }}</option>
				@endforeach
			</select>
			<label for="new-posts-category">Password</label>
			<input class="input" type="password" name="password" required="required" minlength="2" maxlength="35" placeholder="Password here">
			<label for="new-posts-category">Password confirmation</label>
			<input class="input" type="password" name="password_confirmation" required="required" minlength="2" maxlength="35" placeholder="Password confirmation here">
			<button class="button is-info is-pulled-right" type="submit">Register user</button>
			<button type="button" class="button is-pulled-right close-modal">Cancel</button>
		</form>
	<button class="modal-close is-large"></button>
	</div>
</div> {{-- end of modal --}}