<script>
	$(document).ready(function() {
		//put the chosen role
		$('.select-role').val($('#role').val());

		// if(!$('fieldset.new-password').hasClass('hidden')) {
		// 		$('#password').prop('required', true);
		// 		$('#password_confirmation').prop('required',true);
		// }

		//hide the change password
		$('.change-password').on("change", function(){
			$('fieldset.new-password').toggleClass('hidden');
			$('#password').val('');
			$('#password_confirmation').val('');

			if(!$('fieldset.new-password').hasClass('hidden')) {
				$('#password').prop('required', true);
				$('#password_confirmation').prop('required',true);
				$('.inputchangepassword').val(true);
			}
			else{
				$('#password').prop('required', false);
				$('#password_confirmation').prop('required',false);
				$('.inputchangepassword').val(false);
			}
		});

		//show the new password if there are errors in new password inputs
		if($('.new-password div.form-group').hasClass('has-error')){
			$('.new-password').removeClass('hidden');
			$('.change-password input').prop('checked', true);
		}
	});
</script>