<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/app.js"></script>

{{-- Navbar hamburger toggle --}}
<script type="text/javascript">
    $('#nav-toggle').click(function() {
    	$('#navMenu').toggleClass('is-active');
    });
</script>

{{-- notifications toggle --}}
<script type="text/javascript">
	$('div.notification > button.delete').click(function() {
		$(this).parents().eq(3).slideUp(300).delay(1000).slideDown(300);
	})
</script>