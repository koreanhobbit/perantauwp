<script>
	$(document).ready(function() {
		//put the role value
		$('.select-role').on('change', function() {
			$('#role').val($(this).val());
		});

		$('.select-role').val($('#role').val());

		//error for form
		$('.form-group.has-error').each(function() {
			var group = $(this);
			$(this).find('input').keydown(function(event) {
				group.removeClass('has-error');
				group.find('span').remove();
			});
			$(this).find('select').on('change', function() {
				group.removeClass('has-error')
				group.find('span').remove();
			});
		});

		//control password for auto generate or not
		$('.auto-password').on('change', function() {
			$('fieldset.manual-password').toggleClass('hidden');
			$('#password').val('');
			$('#password_confirmation').val('');

			if(!$('fieldset.manual-password').hasClass('hidden')) {
				$('#password').prop('required', true);
				$('#password_confirmation').prop('required', true);
				$('.autogeneratepassword').val(0);
			}
			else {
				$('#password').prop('required', false);
				$('#password_confirmation').prop('required', false);
				$('.autogeneratepassword').val(1);
			}
		});
	});
</script>