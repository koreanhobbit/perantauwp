<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script>
	$(document).ready(function() {
		//#######################################//
		//#############form booking##############//
		//#######################################//


		//set date picker for arrival date anda departure date
		$('#arrivaldate').datepicker({
			autoclose: true,
		});

		$arrival = $('#arrivaldate').datepicker('getDate');

		$('#returndate').datepicker({
			autoclose: true,
		});

		//set limit for return date
		$('#arrivaldate').on('change', function() {
			$('#returndate').datepicker('setStartDate', $(this).val());
		});

		//make area appear when country is clicked
		$('#intro-country').on('change', function() {
			if($(this).val()) {
				$('#intro-area').prop('disabled', false);
				var url = $(this).data('url');
				$.ajax({
					type:'get',
					url: url,
					data: {
						'_token' :$('input[name=_token]').val(),
						'title' :'loadArea',
						'countryId' : $(this).val(),
					},
					success: function(data) {
						$('#intro-area').html(data);
					},
				});
			}
			else {
				$('#intro-area').prop('disabled', true);
				$('#intro-area').html('<option value="">Pilih Daerah</option>')
			}
		});

		//ask if the user already check in or not when they click intro visit
		@if(!Auth::check())
			$('#intro-name, #intro-email, #intro-phone, #intro-whatsapp').focus(function() {
				$('#loginmodal').modal('show');
			});
			$('#arrivaldate, #intro-country, #returndate').change(function() {
				$('#loginmodal').modal('show');
			});
			$('#intro-submit').click(function() {
				$('#loginmodal').modal('show');
			});
		@endif

		//form for contacting administrator
		msform();
		//multiple steps form
		function msform() {
			var totalsteps = 0;
			var currentstep = 1;
			$('.msform').find('.tab').each(function(index, value) {
				position = index + 1;
				$(this).attr('data-pos', position);
				$(this).addClass('tab' + position);
				totalsteps = totalsteps + 1;
			});

			$('.nextBtn').click(function() {
				$('.msform').find('.tab').each(function(index, value) {
					if(!$(this).hasClass('hidden')) {
						nextstep = index + 2;
						target = '.tab' + nextstep;
						$(target).removeClass('hidden');
						$(this).addClass('hidden');

						//change the progress bar
						var barprogress = (nextstep/totalsteps)*100;
						$('#msformbar').prop('style', 'width:' + barprogress + '%');
						$('#msformbar').text(barprogress + '% Complete');

						if(nextstep < totalsteps) {
							if($('.prevBtn').hasClass('hidden')) {
								$('.prevBtn').removeClass('hidden');
							}
						}

						if(nextstep == totalsteps) {
							$('.nextBtn').addClass('hidden');
							$('.submitBtn').removeClass('hidden');
							if($('.prevBtn').hasClass('hidden')) {
								$('.prevBtn').removeClass('hidden');
							}
						}

						return false;
					}  
				});
			});

			$('.prevBtn').click(function() {
				$('.msform').find('.tab').each(function(index, value) {
					if(!$(this).hasClass('hidden')) {
						prevstep = index;
						target = '.tab' + prevstep;
						$(target).removeClass('hidden');
						$(this).addClass('hidden');

						//change the progress bar
						var barprogress = (prevstep/totalsteps)*100;
						$('#msformbar').prop('style', 'width:' + barprogress + '%');
						$('#msformbar').text(barprogress + '% Complete');

						if(prevstep > 1) {
							if($('.nextBtn').hasClass('hidden')) {
								$('.nextBtn').removeClass('hidden');
							}
						}

						if(prevstep == 1) {
							$('.prevBtn').addClass('hidden');
							if($('.nextBtn').hasClass('hidden')) {
								$('.nextBtn').removeClass('hidden');
							}
						}
					}
				});
			});

			var progress = (1/totalsteps)*100;

			//set the progress bar
			$('#msformbar').prop('style', 'width:' + progress + '%');
			$('#msformbar').text(progress + '% Complete');

			//set date picker for msform
			//set date picker for arrival date anda departure date
			$('#departure').datepicker({
				autoclose: true,
			});

			$arrival = $('#departure').datepicker('getDate');

			$('#arrival').datepicker({
				autoclose: true,
			});

			//set limit for return date
			$('#departure').on('change', function() {
				$('#arrival').datepicker('setStartDate', $(this).val());
			});

			//call closeMsform function
			closeMsform();
		}
		
		//reload msform when it is closed
		function closeMsform() {
			$('.close-msform').click(function() {
				var url = $(this).data('url');
				$.ajax({
					url:url,
					data: {
						'_token' : $('input[name=_token]').val(),
						'title' : 'reloadMsform',
					},
					success: function(data) {
						$('.msformModalContainer').html(data);
						//call all the function for msform 	
						msform();		
					},
					error:function() {
						alert('error');
					}
				});
			});
		}

		//show login or register if there is error in signing in
		@if($errors->has('email') || $errors->has('password') || session('showlogin'))
			$('#loginmodal').modal('show');
		@endif

		@if($errors->has('register-name') || $errors->has('register-email') || $errors->has('registerpassword') || $errors->has('registerpassword-confirmation') || $errors->has('g-recaptcha-response')) 
			$('#registermodal').modal('show');
		@endif

		@if($errors->has('forgetemail'))
			$('#form-email-reset').modal('show');
		@endif
	});
</script>