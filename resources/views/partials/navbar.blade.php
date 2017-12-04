<nav class="navbar">
	
	{{-- Navbar logo and hamburger icon --}}
	<div class="navbar-brand">
		<a class="navbar-item" href="http://bulma.io">
			<img src="http://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
		</a>
		
		<div id="nav-toggle" class="navbar-burger burger" data-target="navMenu">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	
	{{-- Navbar menu  --}}
	<div id="navMenu" class="navbar-menu">
		
		{{-- Navbar left --}}
		<div class="navbar-start">
			<a class="navbar-item" href="/">Home</a>
				
				{{-- Displaying categories from db --}}
				<div class="navbar-item has-dropdown is-hoverable">
					<a class="navbar-link  is-active">Categories</a>
					<div class="navbar-dropdown ">
						@foreach($categories as $category)
							<a class="navbar-item " href="{{ route('manage.dashboard') }}">{{ $category->name }}</a>
						@endforeach
					</div>
				</div>

			<a class="navbar-item" href="/contact">Contact me</a>
		</div>
		
		{{-- Navbar right --}}
		<div class="navbar-end">
			<div id="navMenuExample" class="navbar-menu">
				<div class="navbar-start">
					<div class="navbar-item has-dropdown is-hoverable">
						<a class="navbar-link  is-active">Account</a>
						<div class="navbar-dropdown ">
							
							@if (auth()->check())
								<a class="navbar-item " href="{{ route('manage.dashboard') }}">Manage</a>
								<hr class="navbar-divider">
								<a class="navbar-item " href="{{ route('auth.logout') }}">Logout</a>
							@else
								<a class="navbar-item" href="{{ route('auth.login') }}">Login</a>
							@endif

						</div>

					</div>
				</div>
			</div>
		</nav>