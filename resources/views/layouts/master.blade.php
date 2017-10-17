<!DOCTYPE html>
<html lang="en">
<head>
	@include('partials.header')
</head>

<body>
	@include('partials.navbar')
	@include('partials.messages')

	@yield('content')
	
	@include('partials.footer')
	
	@include('partials.scripts')
</body>

</html>