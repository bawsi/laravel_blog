<script type="text/javascript">
	$(document).ready(function() {
	
		// When edit button is clicked, replace category name with a form, and an input field, where user can edit the category name
		$('.edit-btn').click(function() {
			const categoryId = $(this).parents().eq(1).children().first().text();
			const oldCategoryName = $(this).parents().eq(1).children().eq(1).text()
			const categoryNameTd = $(this).parents().eq(1).children().eq(1)

			// Disabling	 edit button
			$(this).attr('disabled', 'disabled');

			// Replacing category name text with a form input and a butotn
			categoryNameTd.hide();
			categoryNameTd.after(`
				<td><form action="/manage/categories/${categoryId}" method="POST">
					<?= csrf_field(); ?>
					<?= method_field('PATCH'); ?>
					
					<div class="field has-addons">
						<div class="control">
							<input class="input is-small edit-input" type="text" name="category-name" value="${oldCategoryName}">
						</div>
						<div class="control">
							<button type="submit" class="button is-info is-small">Update</button>
						</div>
						<div class="control">
							<button type="button" class="button is-danger is-small close-edit-input">Cancel</button>
						</div>
					</div>
				</form></td>
			`);
		});

		// --------------------------------------------------------------------------------------------------------------

		// When user clicks cancel button, on category editing form, replace form with normal text
		$(document).on('click', 'button.close-edit-input', function() {
			const form = $(this).parents().eq(2);
			const editBtn = form.parents().eq(2).find('button.edit-btn');

			// Enabling edit button
			editBtn.removeAttr('disabled');

			// Replacing whole form with just the input text
			form.parent().prev().show();
			form.parent().remove();
			
		});

		// --------------------------------------------------------------------------------------------------------------

		// When delete button is clicked, set the modal up for that specific category, and open modal
		$('.delete-btn').on('click', function() {
			const clickedTr   = $(this).parents().eq(1)
			const categoryId  = clickedTr.children().first().text();
			const deleteModal = $('.delete-modal');
			const form   	  = deleteModal.find('.modal-content > form');
			
			// Setting proper category ID in form, so it submits correctly
			form.attr('action', '/manage/categories/' + categoryId);

			// select all select options
			const options = form.find('select > option')
			// Removing selected and disabled attributes for all options
			options.removeAttr('selected disabled');
			// Disabling option that has the same category ID as current category ID
			for (let i = 0; i < options.length; i++) {
				const selectOption = $(options[i]);
				
				if (selectOption.val() == categoryId) {
					selectOption.attr('disabled', 'disabled');
					selectOption.next().attr('selected', 'selected');
				}  
			}

			// Open modal
			deleteModal.addClass('is-active');
		});

		// --------------------------------------------------------------------------------------------------------------
		
		// When New category button is clicked, open create category modal
		$('.new-category-btn').on('click', function() {
			$('.create-modal').addClass('is-active');
		});

		// --------------------------------------------------------------------------------------------------------------

		// Close either modal (create or delete) when X button, or Cancel button, or background is clicked
		$('.modal-close, .modal-background, .close-modal').on('click', function() {
			$('.delete-modal, .create-modal').removeClass('is-active');
		});
	});

</script>