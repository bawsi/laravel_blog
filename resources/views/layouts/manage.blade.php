<!DOCTYPE html>
<html lang="en">
<head>
	@include('partials.header')
</head>

<body>
	@include('partials.navbar')
	@include('partials.messages')
	
	<div class="container m-t-50">
		<div class="columns">
			
			<div class="column is-one-quarter admin-sidebar">
				@include('manage.partials.sidebar')
			</div>

			<div class="column admin-content">
				@yield('content')
			</div>

		</div>
	</div>
	
	
	@include('partials.footer')
	
	@include('partials.scripts')
</body>

</html>