<script type="text/javascript">
	
	$(document).ready(function() {
		$('#filter-checkbox').click(function() {
			if (this.checked) {
				let name = $('.users-name').text().split(': ')[1];

				$('td.name').each(function(key, val) {
					let rowName = $(val).text();

					if (name != rowName) {
						$(val).parent().hide(300);
					}
				})
			} else {
				$('td.name').each(function(key, val) {
					$(val).parent().show();
				});
			}
		});
	});

</script>