@if($errors->any())
	<div class="container container-errors">
		<div class="columns">
			<div class="column ">
				
				<div class="notification is-danger">
					<button class="delete"></button>
					<h3 class="title is-6"><strong>Error!</strong></h3>
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>

			</div>
		</div>	
	</div>
@endif

@if(session('success'))
	<div class="container container-success">
		<div class="columns">
			<div class="column">
				
				<div class="notification is-success">
					<button class="delete"></button>
					<h3 class="title is-6"><strong>Success!</strong></h3>
					<ul>
						<li>{{ session('success') }}</li>
					</ul>
				</div>

			</div>
		</div>	
	</div>
@endif