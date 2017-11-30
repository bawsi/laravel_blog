{{-- hero panel --}}
<section class="hero has-text-centered {{ $colorClass or 'is-info' }} {{ $sizeClass or '' }}" style="background-image: url({{ isset($backgroundImg) ? asset($backgroundImg) : '' }}); background-size:cover;">
	<div class="hero-body">
		<div class="container">
			<h1 class="title is-1">{!! $title !!}</h1>
			<h2 class="subtitle">{!! $subtitle !!}</h2>
		</div>
	</div>
</section>