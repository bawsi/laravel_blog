<script>
	$(document).ready(function() {

		// When New user button is clicked, open create user modal
		$('.new-user-btn').on('click', function() {
			$('.create-modal').addClass('is-active');
		});

		// --------------------------------------------------------------------------------------------------------------


		// When edit user button is clicked, set the modal up, for that user, and show it
		$('.edit-btn').on('click', function() {
			const id = $(this).parents().eq(1).children().first().text();
			const form = $('div.edit-modal form');

			form.attr('action', '/manage/users/' + id);

			$('.edit-modal').addClass('is-active');
		});

		// --------------------------------------------------------------------------------------------------------------

		// When delete button is clicked, populate delete modal with users id, and show modal
		$('.delete-btn').on('click', function() {
			const id = $(this).parents().eq(1).children().first().text();
			const form = $('div.delete-modal form');

			form.attr('action', '/manage/users/' + id);


			// select all select options
			const options = form.find('select > option');
			// Removing selected and disabled attributes for all options
			options.removeAttr('selected disabled');
			// Disabling option that has the same user ID as ID of user we are deleting
			for (let i = 0; i < options.length; i++) {
				const selectOption = $(options[i]);
				if (selectOption.val() == id) {
					selectOption.attr('disabled', 'disabled');
					selectOption.next().attr('selected', 'selected');
				}  
			}


			// Show modal
			$('.delete-modal').addClass('is-active');
		});

		// --------------------------------------------------------------------------------------------------------------

		// Close modal when X button, or Cancel button, or background is clicked
		$('.modal-close, .modal-background, .close-modal').on('click', function() {
			$('.delete-modal, .create-modal, .edit-modal').removeClass('is-active');
		});

	});
</script>