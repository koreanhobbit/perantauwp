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
		$('#country').on('change', function() {
			if($(this).val()) {
				$('#area').prop('disabled', false);
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
						$('#area').html(data);
					},
				});
			}
			else {
				$('#area').prop('disabled', true);
				$('#area').html('<option value="">Pilih Daerah</option>')
			}
		});
	});
</script>